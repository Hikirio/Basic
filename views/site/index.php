<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto"><article class="post">
            <?php
            foreach ($articles as $article): ?>
                <article class="post">

            <div class="post-preview">
                <a href="#"><img src="<?= $article->getImage(); ?>">
                    <h2 class="post-title">
                        <a href="#"><?= $article->title; ?>
                    </h2>
                    <h3 class="post-content">
                       <?= $article->content?>
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on<?= ' '.$article->date?> </p>
            </div>
                    <hr style="solid-color: #0f0f0f ;">
                    <?php endforeach;?>
            <?php
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
            ?>

        </div>
    </div>
</div>