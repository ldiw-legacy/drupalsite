<div id="front_map">
	<?php //     <iframe width="428" height="297" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=tallinn,+estonia&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=55.455479,114.169922&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Tallinn,+Harju+County,+Estonia&amp;t=m&amp;ll=59.439839,24.753742&amp;spn=0.025922,0.073299&amp;z=13&amp;output=embed"></iframe>
		
		watchdog('geoip',"lat $latitude lon $longitude country $country_iso2code myip ".$_SERVER['REMOTE_ADDR']);
	  
		
	 if($latitude == 0 && $longitude == 0){
	 	$latitude = 59.439839;
	 	$longitude = 24.753742;
	 }
	 echo '<iframe width="428" height="297" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://kaart.maakaart.ee/?lat='.$latitude.'&lon='.$longitude.'&zoom=5&layers=F000B00&marker=/openlayers/img/marker-blue.png"></iframe>';

	?>
</div>
<div id="header-content">
    <p class="description">
        World Cleanup:
        <br />
        Let's clean the world together!
    </p>
    
	<p class="info">
        <a href="http://www.letsdoitworld.org/donate"><img src="http://www.letsdoitworld.org/sites/all/themes/letsdoitworld/gfx/ldi-faces.png" style="float:left;margin-right:10px;" width="90" height="90" /><span style="font-size:1.7em">Donate!</span></a>
		

		<!-- 
        Cleanup actions during
        <br />
        <b>March - September, 2012 </b><a href="worldcleanup2012" class="more">Read more &raquo;</a>
         -->
    </p>
    <p class="video">
        <a href="http://www.youtube.com/letsdoitworld" target="_blank" title="Watch our videos in YouTube">Watch our videos in YouTube</a>
    </p>
    <ul class="actions">
        <li>
            <a href="start"><span>Start a cleanup</span></a>
        </li>
        <li>
            <a href="mapthewaste"><span>Map the waste</span></a>
        </li>
    </ul>
    <div id="map-actions">
        <p class="world-map">
            <a href="wastemap">See world waste map</a>
        </p>
        <div class="points-count">
            <div class="content">
                <p class="country"><img src="<?php print front_flag_url($country_iso2code); ?>" alt="flag" /><span class="name"><?php print $country_name ?></span><a href="<?php print get_country_website($country_iso2code) ?>">Website</a>
                </p>
                <div class="data">
                    <p class="date">
                        <?php get_country_date($country_iso2code)
                        ?>
                    </p>
                    <p class="points">
                        <?php letsdoitworld_waistpoint_counter($country_iso2code)
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="data">
        <ul>
            <li class="countries">
              <table>
              <tr>
              <td style="vertical-align: bottom;">112<?php /*letsdoitworld_country_counter() **/
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
              <?php // letsdoitworld_waistpoint_counter(false)
              ?>
              198
              </td>
              <td>
              <span class="big">
               <?php echo t('cleanups'); ?>
              </span>
              <span class="small">
               <?php // echo t('on world trash map'); ?>
              </span>
              </td>
              </table>
            </li>
            <li class="days">
              <table>
              <tr>
              <td style="vertical-align: bottom;">
               11
              <?php // echo letsoitworld_countdown( 03, 24, 2012 );
              ?>
              </td>
              <td>
              <span class="big">
               <?php // echo t('Days'); ?>
              million
              </span>
              <span class="small">
               volunteers
               <?php // echo t('to start'); ?>
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
