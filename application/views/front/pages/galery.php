<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
					<div class="title-holder">
						<div class="title-holder-cell text-left">
							<h1 class="page-title">Galery</h1>
							<ol class="breadcrumb">
								<li><a href="<?= base_url('Home') ?>">Home</a></li>
								<li class="active">Galery</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1 service_list">
	<div class="container">
		<div class="row">
			<?php foreach ($index as $indexs) : ?>
				<div class="col-md-4 service_blog margin_bottom_50">
					<div class="full">
						<div class="service_img"> <img class="img-responsive" src="<?= base_url('public/image/galery/') . $indexs['foto'] ?>" alt="#" /> </div>
						<div class="service_cont">
							<!-- <h3 class="service_head"><?= $indexs['jenis_id'] ?></h3> -->
							<!-- <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p> -->
							<div class="bt_cont"> <a class="btn sqaure_bt" href="<?= base_url('Details/index/') . $indexs['slug']  ?>">View Product</a> </div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- end section -->
