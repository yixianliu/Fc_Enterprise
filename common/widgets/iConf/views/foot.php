<?php
/**
 *
 * 底部模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/24
 * Time: 15:26
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<footer class="footer footer-type-2 bg-dark">
    <div class="container">
        <div class="footer-widgets">
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget footer-about-us">
                        <h5>About Us</h5>
                        <p class="mb-0">Enigma is a very slick and clean multi-purpose template with endless possibilities. Creating an awesome website with this Theme is easy
                            than you can imagine. Our Theme is a very slick and clean template with endless possibilities.</p>
                    </div>
                </div>
                <!-- end about us -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget footer-get-in-touch">
                        <h5>Get in Touch</h5>
                        <p class="footer-address">Philippines, Enigma inc.<br> Talay st. 65, PO Box 6200 </p>
                        <p>Phone: + 1 888 1554 456 123</p>
                        <p>Email: <a href="mailto:Enigmasupport@gmail.com">enigmasupport@gmail.com</a></p>
                        <p>Fax: +63 918 4084 694</p>
                    </div>
                </div> <!-- end stay in touch -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget footer-links">
                        <h5>Useful Links</h5>
                        <ul>
                            <li><a href="#">Enigma is a simple and flexible</a></li>
                            <li><a href="#">Multi-purpose WordPress theme</a></li>
                            <li><a href="#">Tons of Shortcodes included</a></li>
                            <li><a href="#">Fully Responsive Theme</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end useful links -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget footer-posts last">
                        <h5>Latest Posts</h5>
                        <div class="footer-entry-list">
                            <div class="footer-entry">
                                <p>
                                    <a href="blog-single.html">Enigma is a simple and flexible</a>
                                </p>
                                <span>11 July, 2015</span>
                            </div> <!-- end entry -->

                            <div class="footer-entry">
                                <p>
                                    <a href="blog-single.html">Multi-purpose WordPress theme</a>
                                </p>
                                <span>08 July, 2015</span>
                            </div> <!-- end entry -->

                            <div class="footer-entry">
                                <p>
                                    <a href="blog-single.html">Tons of Shortcodes and Features</a>
                                </p>
                                <span>05 July, 2015</span>
                            </div> <!-- end entry -->
                        </div>
                    </div>
                </div> <!-- end latest posts -->

            </div> <!-- end row -->
        </div> <!-- end footer widgets -->
    </div> <!-- end container -->

    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 copyright">
                    <div>
                        © 2018 Enigma Theme | Made by <a href="http://deothemes.com"><?= $result['Conf']['COPYRIGHT'] ?></a>
                    </div>
                </div>

                <div class="col-sm-4 col-sm-offset-2 col-xs-12 footer-socials">
                    <div class="social-icons clearfix right">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-vimeo"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end bottom footer -->
</footer>
