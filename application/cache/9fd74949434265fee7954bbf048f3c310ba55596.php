<?php $__env->startSection('content'); ?>
    <br><br>
    <div class="row">

        <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="<?php echo e($channel['thumbnail']); ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><?php echo e($channel['title']); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/index/gallery/<?php echo e($channel['id']); ?>" class="btn btn-sm btn-outline-secondary">Просмотр</a>
                            </div>
                            <?php
                                {{ $date = date('Y-m-d H:i', strtotime($channel['publishedAt'] )); }}
                            ?>
                            <small class="text-muted"> <?php echo e($date); ?></small>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>