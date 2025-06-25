<div class="d-flex justify-content-center">
        <a href="/products">Вернуться</a>
</div>

<div class="card h-100">
    <h1>Страница товара</h1>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Категория: <?php echo e($product->category->name); ?>

                    </h6>
                    <p class="card-text"><?php echo e(Str::limit($product->description, 100)); ?></p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-primary font-weight-bold">
                            <?php echo e(number_format($product->price, 2, '.', ' ')); ?> ₽
                        </span>
                    </div>
                </div>
</div><?php /**PATH /var/www/project/resources/views/viewItem.blade.php ENDPATH**/ ?>