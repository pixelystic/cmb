<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<!-- Page specific CSS or Scripts -->
</head>

<body>
    <!-- Navigation -->
    <?php include("includes/menu.php"); ?>
    <!-- /.Navigation -->

    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-10 col-md-10">
                    <h2 class="page-header">
                        Welcome to Colombo Today
                    </h2>
                </div>
                <div class="col-lg-2 col-md-2 visible-lg">
                    <div class="language-bar">
                        <a class="language-flag" href="#" data-toggle="tooltip" data-placement="top" title="English News">
                            <img class="img-responsive" src="img/en.png" alt="">
                        </a>
                        <a class="language-flag" href="#" data-toggle="tooltip" data-placement="top" title="Sinhala News">
                            <img class="img-responsive" src="img/si.png" alt="">
                        </a>
                        <a class="language-flag" href="#" data-toggle="tooltip" data-placement="top" title="Tamil News">
                            <img class="img-responsive" src="img/ta.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 news-board">
            	<div class="row">
				<?php
				date_default_timezone_set("Asia/Colombo");
				$today =  date("Y-m-d", time());
				$sql = "SELECT * FROM   news AS n
LEFT JOIN news_papers AS np ON np.news_paper_id = n.news_paper_id WHERE n.publish_date = '".$today."'
                                                      ORDER BY n.news_id DESC
                                                      ";
				 								   
                $result = dbConnect::getInstance()->query($sql);
                                
				if(!$result){
					die("Database query failed:");
				}
				
					foreach($result as $row){ 
							$publish_date = $row["publish_date"];
							$newDate = date("M d", strtotime($publish_date));

							echo	'<div class="col-md-4 col-sm-4 news-panel">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4>' . $row["title"] . '</h4>
											</div>
											<div class="panel-body news-panel-body">
												<img class="img-responsive featured-image" src="' . $row["image"] . '" alt="">
												<p>
													[<time class="news-date" datetime="">'.$newDate.'</time>]' . $row["content"] . '(<a class="news-source" href="#" data-toggle="tooltip" data-placement="left" title="' . $row["news_paper_name"] . '">' . $row["news_paper_name"] . '</a>) 
												</p>
												<a href="' . $row["source"] . '" class="btn btn-src btn-xs" rel="nofollow" target="_blank">Source</a>
											</div>
										</div>
									</div>';
                                }
				
				
				
				?>
                </div>
 

                <!-- Pagination -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nav-buttons">
                        <a href="#" class="col-md-4 col-sm-4 col-xs-4 nav-buttons"><div class="jumbotron"> Newer <img class="img-responsive navi-arrow" src="img/left-arrow.gif" alt="" /></div></a>
                        <a href="#" class="col-md-8 col-sm-8 col-xs-8 nav-buttons"><div class="jumbotron"> Older <img class="img-responsive navi-arrow" src="img/right-arrow.gif" alt="" /></div></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nav-buttons">
                        <ul class="pagination">
                          <li class="disabled"><a href="#">&laquo;</a></li>
                          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">6</a></li>
                          <li><a href="#">7</a></li>
                          <li><a href="#">8</a></li>
                          <li><a href="#">9</a></li>
                          <li><a href="#">10</a></li>
                          <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.Pagination -->
            </div>
            <!-- /.news-board -->
            
            <!-- Sidebar -->
            <?php require("includes/sidebar.php"); ?>
            <!-- /.Sidebar -->

        </div>
        <!-- /.row -->

<?php require("includes/footer.php"); ?>
