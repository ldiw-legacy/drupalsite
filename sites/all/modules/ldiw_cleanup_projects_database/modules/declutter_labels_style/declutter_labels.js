// $Id$

Drupal.openlayers.style_plugin["declutter_labels"]=function(parameters) {}

Drupal.openlayers.style_plugin["declutter_labels"].prototype=
{
	calc_labelAlign:function(feature)
		{
			var resolution=feature.layer.map.getResolution();

			if (feature.attributes.style_labelAlign !== undefined &&
						feature.attributes.
							style_declutter_labels_resolution == resolution)
				return feature.attributes.style_labelAlign;

			var label_x_size=resolution * 60;	//!!!
			var label_y_size=resolution * 15;	//!!!
			var marker_radius=resolution * 10;	//!!!

			var my_coords=feature.geometry.getBounds().getCenterLonLat();

			var penalty=[0,0,0,0];
			var alignments=['lt','lb','rt','rb'];

			for (var i in feature.layer.features) {
				if (feature.layer.features[i] == feature)
					continue;
				var coords=feature.layer.features[i].geometry.
											getBounds().getCenterLonLat();
				var y_delta=coords.lat - my_coords.lat;
				if (Math.abs(y_delta) > label_y_size+marker_radius)
					continue;
				var x_delta=coords.lon - my_coords.lon;
				if (Math.abs(x_delta) > label_x_size+marker_radius)
					continue;

				if (!x_delta && !y_delta)
					continue;

				penalty[0]+=(x_delta >= -marker_radius &&
												y_delta <= marker_radius);
				penalty[1]+=(x_delta >= -marker_radius &&
												y_delta > -marker_radius);
				penalty[2]+=(x_delta < marker_radius &&
												y_delta <= marker_radius);
				penalty[3]+=(x_delta < marker_radius &&
												y_delta > -marker_radius);
				}

			var best_idx=0;
			for (var i in penalty)
				if (penalty[i] < penalty[best_idx])
					best_idx=i;

			feature.attributes.style_labelAlign=alignments[best_idx];

			return feature.attributes.style_labelAlign;
			},

	calc_labelXOffset:function(feature)
		{
			return (this.calc_labelAlign(feature)[0] == 'l') ? 10 : -10;
			},

	calc_labelYOffset:function(feature)
		{
			return (this.calc_labelAlign(feature)[1] == 'b') ? 10 : -10;
			}
	};
