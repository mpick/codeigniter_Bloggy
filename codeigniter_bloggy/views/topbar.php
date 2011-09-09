	<body>
		<div class="container">
			<!-- TOPBAR -->
			<div class="topbar">
				<div class="fill">
					<div class="container">
						<h3>
							<a href="/">Miles Pickens</a>
						</h3>
						<ul>
							<li <?= ($onpage == 'index' ? 'class="active"' : '')?>>
								<a href="/info/">Main</a>
							</li>
							<li <?= ($onpage == 'projects' ? 'class="active"' : '')?>>
								<a href="/project">Projects</a>
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
								<a href="http://twitter.com/milespickens" target="_blank">Twitter</a>
							</li>							
						</ul>
					</div>
				</div>
			</div>