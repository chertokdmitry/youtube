<?php $__env->startSection('content'); ?>
    <?php
        {{ $date = date('Y-m-d H:i', strtotime($data['publishedAt'] )); }}
    ?>
    <div class="card">
        <img class="card-img-top" src="<?php echo e($data['thumbnail']); ?>" alt="">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($data['title']); ?></h5>
        </div>
        <div class="card-body">
            <a target="_blank" href="https://www.youtube.com/watch?v=<?php echo e($videoId); ?>" class="btn btn-danger btn-lg btn-block">Открыть видео</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Published: <?php echo e($date); ?></li>
            <li class="list-group-item">Views: <?php echo e($data['view']); ?></li>
            <li class="list-group-item">Like: <?php echo e($data['like']); ?></li>
            <li class="list-group-item">Dislike: <?php echo e($data['dislike']); ?></li>
            <li class="list-group-item">Duration: <?php echo e($data['duration']); ?></li>
            <li class="list-group-item">Quality: <?php echo e($data['dimension']); ?></li>
        </ul>
        <div class="card-body">
            <a href="/channel/<?php echo e($data['id']); ?>" class="btn btn-secondary btn-lg btn-block">Вернуться</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>