<div id="front_map">
    <iframe width="425" height="297" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=et&amp;geocode=&amp;q=Russia,+Moskva&amp;aq=0&amp;oq=Russia,+Mosk&amp;sll=60.076238,30.121383&amp;sspn=0.946771,3.348083&amp;ie=UTF8&amp;hq=&amp;hnear=Moscow,+Venemaa&amp;t=m&amp;z=10&amp;ll=55.742793,37.615401&amp;output=embed"></iframe>
</div>
<div id="header-content">
    <p class="description">
        Всемирная уборка 2012:
        <br />
        Очистим мир вместе!
    </p>
    <p class="info">
        Акции по уборке
        <br />
        <b>с 24 марта
        <br />
        по 25 сентября</b><a href="http://www.letsdoitworld.org/ru/node/42994" class="more">Читать дальше &raquo;</a>
    </p>
    <p class="video">
        <a href="http://youtube.com/letsdoitworld" title="Смотреть видео">Смотреть видео</a>
    </p>
    <ul class="actions">
        <li>
            <a href="http://www.letsdoitworld.org/ru/node/42995"><span>Начать уборку</span></a>
        </li>
        <li>
            <a href="http://www.letsdoitworld.org/ru/node/43054"><span>Карта мусора</span></a>
        </li>
    </ul>
    <div id="map-actions">
        <p class="world-map">
            <a href="wastemap">См. мировую карту мусора</a>
        </p>
        <div class="points-count">
            <div class="content">
                <p class="country"><img src="<?php print base_path() . path_to_theme(); ?>/gfx/flag_ru.gif" alt="flag" /><span class="name">Russia</span>
				<br/><a href="http://vk.com/letsdoitrussia">"Сделаем!" в ВКонтакте</a>
				<br/>
				<a href="http://www.facebook.com/letsdoitrussia">"Сделаем!" в Facebook</a>
                </p>
                <div class="data">
                    <p class="date">
                        15.09.2012
                    </p>
                    <!--<p class="points">
                        <?php /* letsdoitworld_waistpoint_counter() **/
                        ?>
                    </p>-->
                </div>
            </div>
        </div> 
    </div>
    <div id="data">
        <ul>
            <li class="countries">
                <table>
              <tr>
              <td style="vertical-align: bottom;">96<?php /*letsdoitworld_country_counter() **/
              ?>
              </td>
              <td>
              <span class="big">
               <?php echo t('Countries'); ?>
              </span>
              <span class="small">
               <?php echo t('joined so far'); ?>
               </span>
              </td>
              </tr>
              </table>
            </li>
            <li class="points">
                <table>
              <td style="vertical-align: bottom;">
              <?php letsdoitworld_waistpoint_counter(false)
              ?>
              </td>
              <td>
              <span class="big">
               <?php echo t('Points'); ?>
              </span>
              <span class="small">
               <?php echo t('on world trash map'); ?>
              </span>
              </td>
              </table>
            </li>
            <li class="days">
               <table>
              <tr>
              <td style="vertical-align: bottom;">
              <?php echo letsoitworld_countdown( 03, 24, 2012 );
              ?>
              </td>
              <td>
              <span class="big">
               <?php echo t('Days'); ?>
              </span>
              <span class="small">
               <?php echo t('to start'); ?>
              </span>
              </td>
              </tr>
              </table>
            </li>
        </ul>
    </div>
</div>
</div>
</div> 
