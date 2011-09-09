	<body>
		<div class="container">
			<!-- TOPBAR -->
			<div class="topbar">
				<div class="fill">
					<div class="container">
						<h3>
							<a href="/">Your Website Name</a>
						</h3>
						<ul>
							<li <?= ($onpage == 'index' ? 'class="active"' : '')?>>
								<a href="#">Main</a>
							</li>					
							<li <?= ($onpage == 'blog' ? 'class="active"' : '')?>>
								<a href="/blog">Blog</a>
							</li>	
							<li>
								<a href="#" target="_blank">Twitter</a>
							</li>							
						</ul>
					</div>
				</div>
			</div>