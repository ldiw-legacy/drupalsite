<?php // $Id

class views_handler_argument_geo extends views_handler_argument {

  function init(&$view, $options) {
    parent::init($view, $options);
    $this->geo = geo_load(array('gid' => $this->definition['geo_gid']));
  }

  function option_definition() {
    $options = parent::option_definition();
    $options['function'] = array('default' => 'intersects');
    $options['group'] = array('default' => 'geo');

    return $options;
  }

  function options_form(&$form, &$form_state) {

    $functions = array();
    foreach ($this->geo->functionNames('filter') as $id => $name) {
      $info = $this->geo->functionInfo($id);
      // TODO: Add support for float-returning functions (such as Distance)
      if ($info['returns'] == 'boolean' && $info['requires target']) {
        $functions[$id] = $name;
      }
    }

    $form['function'] = array(
      '#type' => 'radios',
      '#title' => t('filter function to use. Views argument is WKT geometry'),
      '#default_value' => $this->options['function'],
      '#options' => $functions,
    );

    // Call my parent's options_form method.
    parent::options_form($form, $form_state);
  }

  function query() {

    // The GIS function we'll be filtering on.
    $function = $this->options['function'];
    $info = $this->geo->functionInfo($function);

    $this->field_alias = $this->field .'_'. $function;

    // Ensure that the query acts on the table and column aliases defined here.
    $this->geo->setTableName($this->ensure_my_table(), TRUE);
    $this->geo->setColumnName($this->field);

    // Get the Geo API method for adding a field.
    $query = $this->geo->$function($this->geo, $this->argument);

    $this->query->add_where($this->options['group'], $query);
  }
}
