
<footer>
    <div class="container">
        <div class="wrapper">
            <div class="col-1">
                <div class="section">
                    <div class="section-content">
                        <p>Company name stands for stylish, sexy and high-quality shapewear and lingerie. Women in the United States, Canada and all around the world know they can trust our unmatched designs and superior customer service.</p>
                        <div class="ui-social-list">
                            <div class="item">
                                <span class="icon"><span class="icon--instagram"></span></span>
                            </div>
                            <div class="item">
                                <span class="icon"><span class="icon--twitter"></span></span>
                            </div>
                            <div class="item">
                                <span class="icon"><span class="icon--pinterest"></span></span>
                            </div>
                            <div class="item">
                                <span class="icon"><span class="icon--youtube"></span></span>
                            </div>
                            <div class="item">
                                <span class="icon"><span class="icon--facebook"></span></span>
                            </div>
                        </div>
                        <div class="copyright">Company name © 2022</div>
                    </div>
                </div>
            </div>
            
            <div class="col-2">
                <div class="section">
                    <div class="section-title">
                        About
                    </div>
                    <div class="section-content">
                        <?php 
                            wp_nav_menu( [
                                'theme_location'  => '',
                                'menu'            => 'footer-1',
                                'menu_class'      => 'ui-menu',
                            ] );
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="section">
                    <div class="section-title">
                        Help & Information
                    </div>
                    <div class="section-content">
                        <?php 
                            wp_nav_menu( [
                                'theme_location'  => '',
                                'menu'            => 'Footer menu 2',
                                'menu_class'      => 'ui-menu',
                            ] );
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <div class="section">
                    <div class="section-title">
                        Contact Us
                    </div>
                    <div class="section-content">
                        <a href="#">(866) 12-4241</a>
                    </div>
                </div>
                <div class="section">
                    <div class="section-content">
                        <div class="ui-text-1">Return & Exchange:</div>
                        <a href="#">returns@gmail.com</a>
                    </div>
                </div>
                <div class="section">
                    <div class="section-content">
                        <div class="ui-text-1">General Questions:</div>
                        <a href="#">csr@gmail.com</a>
                    </div>
                </div>
                <div class="section">
                    <div class="section-content">
                        <div class="ui-text-1">Suggestion & Comments:</div>
                        <a href="#">feedback@gmail.com</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</footer>