	<body>
		<div class="container">
			<!-- TOPBAR -->
			<div class="topbar">
				<div class="topbar-inner"> 
					<div class="container">
						<h3>
							<a href="/">Your Name</a>
						</h3>
						<ul>
							<li <?= ($onpage == 'index' ? 'class="active"' : '')?>>
								<a href="/info/">Main</a>
							</li>
							<li id="projects" class="dropdown" >
								<a class="dropdown-toggle" id="projects-toggle">Projects</a>
								<ul class="dropdown-menu">
									<li>
										<a href="/project/index">Main</a>
									</li>
									<li class="divider"></li>
									<li>
										<a>More to come</a>
									</li>
								</ul>
							</li>
							<li <?= ($onpage == 'software' ? 'class="active"' : '')?>>
								<a href="/info/software_i_cannot_live_without">Software</a>
							</li>
							<li <?= ($onpage == 'webpages' ? 'class="active"' : '')?>>
								<a href="/info/webpages_i_cannot_live_without">Links</a>
							</li>						
							<li <?= ($onpage == 'blog' ? 'class="active"' : '')?>>
								<a href="/blog">Blog</a>
							</li>	
							<li>
								<a href="http://twitter.com/your_twitter_account_here" target="_blank">Twitter</a>
							</li>							
						</ul>
					</div>
				</div>
			</div>

		<script>
			
		  $("#projects-toggle").click(function() {
			$("#projects").toggleClass("open"); 
		  });
		</script>