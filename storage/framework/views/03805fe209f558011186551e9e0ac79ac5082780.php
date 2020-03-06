<footer class="footer">
    <section class="section-b-space striped-pattern-bg">
        <div class="container">
            <div class="row footer-theme partition-f">               
                <div class="col footer-page-col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4><?php echo e(default_company('company_name')); ?></h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php if($menu->name === 'login'): ?>
                                            <a href="javascript:void(0);" class="login_menu" id="" data-route="<?php echo e($menu->route); ?>" data-slug="page-<?php echo e($menu->slug?: str_slug($menu->name)); ?>">  
                                                <?php echo e(strtoupper($menu->name)); ?> 
                                            </a>
                                            <?php else: ?>
                                            <a href="javascript:void(0);" class="load_pages" data-route="<?php echo e($menu->route); ?>" data-slug="page-<?php echo e($menu->slug?: str_slug($menu->name)); ?>">  
                                                <?php echo e(strtoupper($menu->name)); ?> 
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col footer-stalk-us-col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Stalk Us</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li class="text-uppercase"><a href="<?php echo e(default_company('facebook')); ?>" target="_blank"><span class="facebook "><i class="fab fa-facebook-f"></i></span>facebook</a></li>
                                <li class="text-uppercase"><a href="<?php echo e(default_company('instagram')); ?>" target="_blank"><span class="insta"><i class="fab fa-instagram"></i></span> instagram</a></li>
                                <li class="text-uppercase"><a href="<?php echo e(default_company('google_plus')); ?>" target="_blank"><span class="google"><i class="fab fa-google-plus"></i></span>Google Plus</a></li>
                                <li class="text-uppercase"><a href="<?php echo e(default_company('youtube')); ?>" target="_blank"><span><i class="fab fa-youtube"></i></span> Youtube</a></li>
                                <li class="text-uppercase"><a href="<?php echo e(default_company('yelp')); ?>" target="_blank"><span class="google"><i class="fab fa-yelp"></i></span>Yelp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col footer-contact-col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4 style="margin-bottom:0;"><?php echo e(default_company('company_name')); ?></h4>
                        </div>
                        <div class="footer-contant text-white">
                            <?php echo e(custom_exploder('|',default_company('address'))[0]); ?><br>
                            <?php echo e(custom_exploder('|',default_company('address'))[1]); ?><br>
                            <?php if(isset(custom_exploder('|',default_company('address'))[2])): ?>
                              <?php echo custom_exploder('|',default_company('address'))[2]."<br/>"; ?>

                            <?php endif; ?>
                            <?php echo e(preg_replace('/(\d{3})(\d{3})(\d{1,4})/','($1) $2-$3',default_company('phone_number'))); ?>

                            <ul>
                                <li class="text-uppercase" rel="js--norouter-load" data-route-norouter="/noncomponent/privacy_terms2"><a href="#">Privacy And Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col footer-contact-col" style="border:none;">
                    <div class="sub-title">
                        <div class="footer-contant">
                                <li><img src="<?php echo e(asset('cratesOnSkatesImages/footer-man.png')); ?>" align=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="hr-b footer__copyright-text">        
        <p>
            <i class="fa fa-copyright" aria-hidden="true"></i> Copyright <?php echo e(Date('Y')." ".default_company('company_name')); ?>. All Rights Reserved.
        </p>                   
    </div>
</footer><?php /**PATH D:\support\resources\views/frontend/cratesOnSkates/components/footer.blade.php ENDPATH**/ ?>