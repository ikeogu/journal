
@extends('layouts.app')
	@section('content')
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/49.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Bio Research Journal</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mag-breadcrumb py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div>
    <section class="mag-posts-area d-flex flex-wrap">

			<aside class="">
				<!-- Sidebar Widget -->
				<div class="mt-30 mb-30 bg-white col-sm-12">
					<div class="single-sidebar-widget p-30">
							<!-- Section Title -->


						<div class="section-heading">
						<a href="{{route('papers.create')}}"> <h5>Call for Papers</h5></a>
						</div>
						@auth
						<div class="section-heading">
								<a href="{{route('makepay')}}"> <h5>Make Payment</h5></a>
						</div>
						@endauth
						<div class="section-heading">
							<a href="{{route('prev')}}"> <h5>Previous Issues</h5></a>
						</div>
						<div class="section-heading">
							<a href="{{route('current')}}"> <h5>Current Issue</h5></a>
						</div>
						<div class="section-heading">
						    <a href="{{route('sing')}}"> <h5>Submit  Article</h5></a>
                        </div>
                        @auth
                            <div class="section-heading">
                                <a href="{{route('makepay')}}"> <h5>Submit Corrected Article</h5></a>
                            </div>
                        @endauth
						<div class="section-heading">
							<h5> <a href="{{route('publish.index')}}">View Articles</a></h5>
                        </div>
                        @auth
						<div class="section-heading">
							<a href="{{route('editors.create')}}"> <h5>Apply for Editor</h5></a>
						</div>
                        @endauth
						<div class="section-heading">
										<h5>Our Template</h5>
						</div>
					</div>
				</div>

                <!-- Sidebar Widget -->
				<div class="mt-30 mb-30 bg-white ">
						<div class="single-sidebar-widget">

						</div>
				</div>

							<!-- Sidebar Widget -->
				<div class="mt-30 mb-30 bg-white box-shadow">
					<div class="single-sidebar-widget p-30">
						<!-- Section Title -->
						<div class="section-heading">
								<h5>ISSN</h5>
						</div>

						<!-- Single Blog Post -->
						<div class="single-blog-post d-flex">
							<div class="post-content">

									<div class="post-meta d-flex justify-content-between">
											<h5>2345-5654-435NC</h5>
									</div>
							</div>

						</div>
					</div>
				</div>
			</aside>

			<!-- >>>>>>>>>>>>>>>>>>>>
						Main Posts Area
			<<<<<<<<<<<<<<<<<<<<< -->
			<section class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
				<!-- Trending Now Posts Area -->
				<div class="trending-now-posts mb-30">
						<!-- Section Title -->
						<div class="section-heading">
								<h5>Bio Research Journal</h5>
						</div>
				</div>
				@if ($errors->any())
						<div class="alert alert-danger">
								<ul>
										@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
										@endforeach
								</ul>
						</div><br />
						@endif
						@if (\Session::has('success'))
						<div class="alert alert-success">
								<p>{{ \Session::get('success') }}</p>
						</div><br />
					@endif
				<!-- Feature Video Posts Area -->
				<div class="feature-video-posts mb-30">
					<!-- Section Title -->

					<div class="featured-video-posts">
						<div class="row">
							<div class="col-12 ">

								<!-- Post Contetnt -->
								<div class="post-content">
										<div class="post-meta">
												<a href="#">Brief</a>
												<a >History</a>
										</div>
										<p>The Bio Research Journal (BRJ) commenced in 2019 with the aim of providing a platform for African and international researchers in biology-related disciplines to publish their results at low costs. It is a single-blind peer reviewed, open access journal. The Journal accepts well-written manuscripts in all aspects of life science research including ecology, ecotoxicology, environmental biology, marine biology and pollution studies, microbiology, parasitology, zoology, medical laboratory sciences, nursing and the medical sciences. Manuscripts are accepted throughout the year and published online as soon as the peer review process is completed and the publication fee is paid.
												All manuscripts must be written in English with the understanding that they have not been submitted elsewhere for review neither have they been published by any other journal.
												</p>
								</div>
							</div>
					</div>
				</div>
			</div>
			<hr><hr>
			<!-- Most Viewed Videos -->
			<div class="most-viewed-videos mb-30">
				<!-- Section Title -->
				<div class="section-heading">
						<h5>Publication Charges of Bio Research Journal  (BRJ)</h5>
				</div>
				<hr />
				<p style="text-align:justify">Authors are not charged any fee for Article Submission, Peer Review Processing or Publication of article and Publication e-Certificate. But, If the article is accepted for Publication then, <u><b>Authors do have to pay</b></u> nominal Processing Charge includes Publication of one entire research paper in Online, Individual Digital Object Identifier(DOI) Number to every article, Individual e-Certificate to all authors of paper, Indexing process, Editorial Fee, Maintenance of Website, Link resolvers and journal infrastructures etc to assure 100 percent online availability of all the published articles, for Lifetime (Unless published article is removed for some strong reason).</p>
				<hr />

				<div id="headings">
						<h2>Why to Publish with Bio Research Journal  (BRJ)?</h2>
				</div>
				<hr />
				<ul>

					<li>Direct Link to Published Article</li>
					<li>Lowest Processing Charge</li>
					<li>Author Retains Copyright</li>
					<li>Direct Chat Support</li>
					<li>100 % Electronic Submissions</li>
					<li>Author can search Article by Author Name, Title or Keywords</li>
					<li>Fast Publication Process</li>
					<li>Double Blind Peer Review Score Card</li>
					<li>Indexing of each Published Article in Databases</li>
					<li>100 % Online Availability assured</li>
					<li>Digitally Signed e-Certificates to all authors</li>
					<li>Global Open Access Availability</li>
				</ul>
			</div>
			<hr />

			<div id="headings">
					<h2><strong>Abstracting, Indexing and Archiving</strong></h2>
			</div>
			<hr />

			<p align="justify">Internet Archive, Scribed, Computer Science Directory, Indian Citation, Index, SciSeek, Academia, Scientific Commons, Science Directory, Indian Science, geCited, Science Central, Microsoft Academic Search, Research Bible, WikiCFP, Mendeley, DocStoc, iScience, DRIJ, SlideShare.r</p>

			<hr />

			<div id="headings">
					<h2>Aim and Scope of  Bio Research Journal  (BRJ)</h2>
			</div>
			<hr />

			<p style="text-align:justify">The  Bio Research Journal  (BRJ) aims to establish itself as a platform for exchanging ideas in new emerging trends that needs more focus and exposure and is always committed to publish articles that will strengthen the knowledge of upcoming Researchers and Scientists.</p>

			<hr />

			<div id="headings">
					<h2>Open Access Statement of  Bio Research Journal  (BRJ)</h2>
			</div>
			<hr />

			<p style="text-align:justify"> Bio Research Journal  (BRJ) follows Open Access as a publishing model. This model provides immediate, worldwide, barrier-free access to the full text of research articles without requiring a subscription to the articles published in this journal. In this model, the publication costs are covered by the Author / Authors Institution or Research Funds. Published material is freely available to all interested online readers. At the same time, authors who publish in  Bio Research Journal  (BRJ) retain the copyright of their article.</p>

			<hr />

			<div id="headings">
					<h2>Content Disclaimer</h2>
			</div>
			<hr />

			<p style="text-align:justify">The opinions expressed in any of the published articles in this journal are not the opinions of  Bio Research Journal  (BRJ). The Content is not guaranteed to be complete, correct, timely, current or up-to-date. Similar to any Printed or Electronic materials, the Content may become out-of-date.

				Bio Research Journal  (BRJ) undertake no obligation to update any Content on our Website. Respective Authors of that particular article are responsible for their own content, where applicable, and may update their Content at any time without notice and at their sole discretion.  Bio Research Journal  (BRJ) reserve the right to make alterations or deletions to the Content at any time without notice.

				Bio Research Journal  (BRJ) do not represent or otherwise warrant that the information available on or through our Website will be correct, accurate, timely or otherwise reliable.

				Bio Research Journal  (BRJ) may make changes to the features, functionality or content of our Website or Services at any time. Any research content provided by our Authors are of the Author’s opinion, and is not intended to malign any religion, ethic group, club, organization, company, individual or anyone or anything.  Bio Research Journal  (BRJ) reserve the right in our sole discretion to edit or remove any documents, information or other content appearing on our Website or Services. Any errors discovered are the fault of the authors. In no event shall  Bio Research Journal  (BRJ) be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods, or services available on or through any such site or resource.
			</p>
        </section>
			@include('searchbar')
    </section>




@endsection
