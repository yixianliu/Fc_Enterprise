<?php

/**
 *  首页模板
 *
 * @author Yxl <zccem@163.com>
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<br/>
<br/>

<div class="col-md-12">

    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world !</h1>

            <br/>
            <p class="text-left">一款为创意工作者设计的时间管理应用,拥有任务清单、在线番茄钟、工作周报、云同步等功能,你可以随时在 Web、Android、iPhone 等设备上使用它。</p>
            <br/>

            <p><a class="btn btn-primary" href="#" role="button">了解更多 »</a></p>
        </div>
    </div>

</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">作者博客</h1>
        <p class="lead blog-description">关于程序最新的更新,请关注作者博客...</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">

                <h2 class="blog-post-title">程序使用指南</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#"><?= Yii::$app->params['COPYRIGHT'] ?></a></p>

                <p>这篇博客文章展示了几种不同类型的内容，这些内容都是由引导引导的。基本的排版、图片和代码都得到了支持。</p>
                <hr>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere
                    consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                    <p>
                        抱着减少工作时间增多生活时间的目的，提高工作效率就有了动力。老板规定了坐班8小时和几个小时加班的不在讨论范围内，要知道一个小网站是斗不过老板的。
                    </p>
                </blockquote>
                <p>
                    Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                    fermentum. Aenean lacinia bibendum nulla sed consectetur.
                </p>

                <h2>每日任务</h2>
                <p>
                    是一款为创意工作者设计的时间管理应用,拥有任务清单、在线番茄钟、工作周报、云同步等功能,你可以随时在 Web、Android、iPhone 等设备上使用它。
                </p>

                <h3>简单而强大的任务列表</h3>

                <p>轻量级的任务列表功能，同时通过特殊语法提供 #标签、重要程度、快速置顶等功能。</p>

                <ul>
                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                    <li>Donec id elit non mi porta gravida at eget metus.</li>
                    <li>Nulla vitae elit libero, a pharetra augue.</li>
                </ul>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>

                <ol>
                    <li>Vestibulum id ligula porta felis euismod semper.</li>
                    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                </ol>
                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
            </div>

            <br/>
            <br/>

            <div class="blog-post">
                <h2 class="blog-post-title">记录生活</h2>
                <p class="blog-post-meta">December 23, 2013 by <a href="#"><?= Yii::$app->params['COPYRIGHT'] ?></a></p>

                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere
                    consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare
                        vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                    fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo
                    luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac
                    consectetur ac, vestibulum at eros.</p>
            </div>

            <br/>
            <br/>

            <div class="blog-post">
                <h2 class="blog-post-title">严于律己</h2>
                <p class="blog-post-meta">December 14, 2013 by <a href="#"><?= Yii::$app->params['COPYRIGHT'] ?></a></p>

                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia
                    bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus,
                    tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                    risus.</p>
                <ul>
                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                    <li>Donec id elit non mi porta gravida at eget metus.</li>
                    <li>Nulla vitae elit libero, a pharetra augue.</li>
                </ul>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                    fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
            </div><!-- /.blog-post -->

            <nav>
                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>关于作者</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                    fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>

            <br/>

            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>

            <br/>

            <div class="sidebar-module">
                <h4>联系作者</h4>
                <ol class="list-unstyled">
                    <li><a href="#">微博</a></li>
                    <li><a href="#">企鹅号</a></li>
                    <li><a href="#">微信号</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div>