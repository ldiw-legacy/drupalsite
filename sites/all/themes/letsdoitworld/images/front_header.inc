<?php // front header part of page. ?>
<div id="map"><iframe width="428" height="297" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=tallinn,+estonia&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=55.455479,114.169922&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Tallinn,+Harju+County,+Estonia&amp;t=m&amp;ll=59.439839,24.753742&amp;spn=0.025922,0.073299&amp;z=13&amp;output=embed"></iframe></div>
<div id="header-content">
				<p class="description">World Cleanup 2012:<br /> Let's clean the world together!</p>
				<p class="info">Cleanup days:<br /><b>March 24th</b> - <b>September 25th</b><a href="worldcleanup2012" class="more">Read more &raquo;</a></p>
				<p class="video"><a href="http://youtube.com/letsdoitworld" title="Watch video">Watch video</a></p>
				<ul class="actions">
					<li><a href="start"><span>Start a cleanup</span></a></li>
					<li><a href="mapthewaste"><span>Map the waste</span></a></li>
				</ul>
				<div id="map-actions">
					<p class="world-map"><a href="wastemap">See world waste map</a></p>
					<div class="points-count">
						<div class="content">
							<p class="country"><img src="<?php print base_path() . path_to_theme(); ?>/gfx/flag_et.gif" alt="flag" /><span class="name">Estonia</span><a href="http://teemeara.ee">Website</a></p>
							<div class="data">
								<p class="date">05.05.2012</p>
								<p class="points">1203</p> //*<?php letsdoitworld_waistpoint_counter()
                                                                 ?></p>
							</div>
						</div>
					</div>
				</div>
				<div id="data">
					<ul>
						<li class="countries">82<?php /*letsdoitworld_country_counter() **/ ?></li>
						<li class="points"><?php letsdoitworld_waistpoint_counter() ?></li>
						<li class="days">69</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
