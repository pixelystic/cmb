            <div class="col-lg-2 col-md-2 right-sidebar">
                <div class="news-papers">
                    <div class="sidebar-heading">
                        <h4>News Papers (English)</h4>
                    </div>
                        <ul class="list-unstyled news-paper-e-list">
                            <?php
                                $result = mysql_query("
                                                      SELECT * FROM news_papers
                                                      WHERE language_id = 1
                                                      ORDER BY news_paper_name ASC
                                                      ", $connection);
                                
                                if(!$result){
                                    die("Database query failed:" . mysql_error());
                                }
                                
                                while($row = mysql_fetch_array($result)){
                                    echo "<li class=\"sidebar-list\"><a href=\"" .  $row["news_paper_link"]. "\" rel=\"nofollow\" target=\"_blank\" class=\"list-group-item\">" . $row["news_paper_name"] . "</a></li>";
                                }
                            ?>
                        </ul>
                </div>
                
                <div class="news-papers">
                    <div class="sidebar-heading">
                        <h4>News Papers (Sinhala)</h4>
                    </div>
                        <ul class="list-unstyled news-paper-e-list">
                            <?php
                                $result = mysql_query("
                                                      SELECT * FROM news_papers
                                                      WHERE language_id = 2
                                                      ORDER BY news_paper_name ASC
                                                      ", $connection);
                                
                                if(!$result){
                                    die("Database query failed:" . mysql_error());
                                }
                                
                                while($row = mysql_fetch_array($result)){
                                    echo "<li class=\"sidebar-list\"><a href=\"" .  $row["news_paper_link"]. "\" rel=\"nofollow\" target=\"_blank\" class=\"list-group-item\">" . $row["news_paper_name"] . "</a></li>";
                                }
                            ?>
                        </ul>
                </div>

                <div class="news-papers">
                    <div class="sidebar-heading">
                        <h4>News Papers (Tamil)</h4>
                    </div>
                        <ul class="list-unstyled news-paper-t-list">
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Ada</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Budusarana</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily Mirror</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily News</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Dinamina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Divaina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Financial Times</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Island</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lankadeepa</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Nawaliya</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Rivira</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Sannasa</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Sarasaviya</a></li>
                        </ul>
                </div>

                <div class="news-papers">
                    <div class="sidebar-heading">
                        <h4>News Websites</h4>
                    </div>
                        <ul class="list-unstyled website-list">
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Ada</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Budusarana</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily Mirror</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily News</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Dinamina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Divaina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Financial Times</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Island</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lankadeepa</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lakbima (Sinhala)</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lakresa</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lanka Irida</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Rivira</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Sannasa</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Sarasaviya</a></li>
                        </ul>
                </div>

                <div class="news-papers">
                    <div class="sidebar-heading">
                        <h4>Sri Lankan TV Channels</h4>
                    </div>
                        <ul class="list-unstyled tv-list">
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Ada</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Budusarana</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily Mirror</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily News</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Dinamina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Divaina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Financial Times</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Island</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lankadeepa</a></li>
                        </ul>
                </div>

                <div class="news-papers">
                    <div class="sidebar-heading">
                        <h4>Sri Lankan Radio Channels</h4>
                    </div>
                        <ul class="list-unstyled radio-list">
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Ada</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Budusarana</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily Mirror</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Daily News</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Dinamina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Divaina</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Financial Times</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Island</a></li>
                            <li class="sidebar-list"><a href="#" rel="nofollow" target="_blank" class="list-group-item">Lankadeepa</a></li>
                        </ul>
                </div>
            </div>