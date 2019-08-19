<?php include 'header.php'; ?>
<!--================Home Banner Area =================-->
<section class="home_banner_area">
	<div class="container box_1620">
		<div class="banner_inner d-flex align-items-center">
			<div class="banner_content">
				<div class="media">
					<div class="d-flex">
						<img src="img/personal.jpg" alt="">
					</div>
					<div class="media-body">
						<div class="personal_text">
							<h6>Hello Everybody, i am</h6>
							<h3><?php echo $kartcek['isim'] ?></h3>
							<h4><?php echo $kartcek['meslek'] ?></h4>
							<p><?php echo $kartcek['tanitim'] ?></p>
							<ul class="list basic_info">
								<li><a href="#"><i class="lnr lnr-calendar-full"></i> <?php echo $ayarcek['ayar_dogum'] ?></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <?php echo $ayarcek['ayar_mail'] ?></a></li>
								<li><a href="#"><i class="lnr lnr-home"></i> <?php echo $ayarcek['ayar_ilce']. '/' .$ayarcek['ayar_il'] ?></a></li>
							</ul>
							<ul class="list personal_social">
								<li><a href="<?php echo $ayarcek['ayar_facebook'] ?>"><i class="fa fa-instagram"></i></a></li>
								<li><a href="<?php echo $ayarcek['ayar_twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo $ayarcek['ayar_linkedin'] ?>"><i class="fa fa-linkedin"></i></a></li>
								<a href="#" class="btn btn-dark">Go to Blog</a>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Welcome Area =================-->
<section class="welcome_area p_120">
	<div class="container">
		<div class="row welcome_inner">
			<div class="col-lg-6">
				<div class="welcome_text">
					<h4>About Myself</h4>
					<p><?php echo $tanitimcek['yazi'] ?></p>
						<div class="row"><!--
							<div class="col-md-4">
								<div class="wel_item">
									<i class="lnr lnr-database"></i>
									<h4>$2.5M</h4>
									<p>Total Donation</p>
								</div>
							</div>-->
							<div class="col-md-4">
								<div class="wel_item">
									<i class="lnr lnr-book"></i>
									<h4><?php echo $tanitimcek['proje'] ?></h4>
									<p>Total Projects</p>
								</div>
							</div><!--
							<div class="col-md-4">
								<div class="wel_item">
									<i class="lnr lnr-users"></i>
									<h4>3965</h4>
									<p>Total Volunteers</p>
								</div>
							</div>-->
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="tools_expert">
						<div class="skill_main">
							<?php 

							$say=0;

							while($yetkinlikcek=$yetkinliksor->fetch(PDO::FETCH_ASSOC)) { $say++?>
								<div class="skill_item">
									<h4><?php echo $yetkinlikcek['isim'] ?> <span><?php echo $yetkinlikcek['derece'] ?></span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $yetkinlikcek['derece'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							<?php  } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Welcome Area =================-->

	<!--================My Tabs Area =================-->
	<section class="mytabs_area p_120">
		<div class="container">
			<div class="tabs_inner">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Experiences</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Education</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<ul class="list">
							<?php 

							$say=0;

							while($tecrubecek=$tecrubesor->fetch(PDO::FETCH_ASSOC)) { $say++?>
								<li>
									<span></span>
									<div class="media">
										<div class="d-flex">
											<p><?php echo $tecrubecek['tecrube_baslangic'].' to '. $tecrubecek['tecrube_bitis'] ?></p>
										</div>
										<div class="media-body">
											<h4><?php echo $tecrubecek['firma_isim'] ?></h4>
											<p><?php echo $tecrubecek['firma_gorev'] ?></p>
										</div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<ul class="list">
							<?php 

							$say=0;

							while($egitimcek=$egitimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>
								<li>
									<span></span>
									<div class="media">
										<div class="d-flex">
											<p><?php echo $egitimcek['egitim_baslangic'].' to '. $egitimcek['egitim_bitis'] ?></p>
										</div>
										<div class="media-body">
											<h4><?php echo $egitimcek['okul_isim'] ?></h4>
											<p><?php echo $egitimcek['alan_isim'] ?></p>
										</div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End My Tabs Area =================-->

	<!--================Feature Area =================-->
	<section class="feature_area p_120">
		<div class="container">
			<div class="main_title">
				<h2>What ı am doing?</h2>
			</div>
			<div class="feature_inner row">
				<?php 

				$say=0;

				while($featurecek=$featuresor->fetch(PDO::FETCH_ASSOC)) { $say++?>
					<div class="col-lg-4 col-md-6">
						<div class="feature_item">
							<i class="<?php echo $featurecek['class'] ?>"></i>
							<h4><?php echo $featurecek['isim'] ?></h4>
							<p><?php echo $featurecek['icerik'] ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--================End Feature Area =================-->
	<?php include 'footer.php'; ?>