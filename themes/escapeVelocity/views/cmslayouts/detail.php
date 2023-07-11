<?php
/**
 * @var string[] $placeholders
 */
?>
 <!-- Intro -->
<div class="header-container">
        <?= $placeholders['banner'] ?>
</div>
<section id="xheader" class="xwrapper">
    <!-- Intro -->
   
</section>

<!-- Main -->
<section id="main" class="wrapper">
    <?= $placeholders['main'] ?>
</section>

<?php if ($placeholders['related']) : ?>
    <!-- Highlights -->
    <section id="highlights" class="wrapper style3">
        <div class="container">
            <?= $placeholders['related'] ?>
        </div>
    </section>
<?php endif ?>