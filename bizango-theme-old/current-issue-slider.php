  <?php 
/**
 * Template for current issue slider
 * 
 * @package bizango-theme
 */



 ?>    

  <!--slider code-->
                <?php  

                $images = get_field('current_issue');

                if( $images ): ?>

                    <div id="slider" class="flexslider">
                        <span class="orange-circle"><p>Now Available</p></span>

                        <ul class="slides">
                     
                            <?php foreach( $images as $image ): ?>
                                <li>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />     
                                </li>  
                                
                            <?php endforeach; ?>
                            
                             <span class="in-this-issue"><h3>In This Issue:</h3></span>
                             <div class="abs editions-wrapper">
                             <div class="page_half buy-now-wrap">
                                    <span class="editions"><p>Print and Digital Editions</p></span>
                                    <a  class="buy-now fr" href="<?php the_permalink(); ?>">Buy Now</a>
                                </div>
                                 <div class="fr cover-month-year">
                                    
                                    <p class="month"><?php the_field('month'); ?>  </p>
                                    <p class="year margin-bottom-20"><?php the_field('year'); ?>  </p>
                                     <img class="mag-cover" src="<?php the_field('small_magazine_cover_image'); ?>"  alt=""/>
                                </div>

                            </div>
                              
                            <?php foreach( $images as $image ): ?>
                                <div class="flexslider-controls">   
                                    <ol class="flex-control-nav">
                                    <li>
                                    <h3><?php echo $image['caption']; ?>:</h3>
                                    <p><?php echo $image['description']; ?> </p>
                                    </li></ol>
                                </div>
                            <?php endforeach; ?>

                        </ul>
                       
                    </div>


                
                   
                <?php endif; ?>