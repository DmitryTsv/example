<div class="container">
    <h1>Создание заказа</h1>
    
    <form method="POST" action="<?php echo e(route('orders.add')); ?>">
        <?php echo csrf_field(); ?>
        
        <!-- Поле ФИО покупателя -->
        <div class="mb-3">
            <label for="customer_name" class="form-label">ФИО покупателя *</label>
            <input type="text" class="form-control <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                   id="customer_name" name="customer_name" value="<?php echo e(old('customer_name')); ?>" required>
            <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        <!-- Выбор статуса (необязательный) -->
        <div class="mb-3">
            <label for="order_status" class="form-label">Статус заказа</label>
            <select class="form-select <?php $__errorArgs = ['order_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    id="order_status" name="order_status">
                <option value="">-- Не указывать --</option>
                <option value="Новый" <?php echo e(old('order_status') == 'Новый' ? 'selected' : ''); ?>>Новый</option>
                <option value="Выполнен" <?php echo e(old('order_status') == 'Выполнен' ? 'selected' : ''); ?>>Выполнен</option>
            </select>
        </div>
        
        <!-- Выбор товаров -->
        <div class="mb-3">
            <label class="form-label">Товары *</label>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div <?php if($product->hasOrder): ?> style="color:red"; <?php endif; ?> class="form-check">
                <input class="form-check-input" type="checkbox" 
                       name="product_ids[]" value="<?php echo e($product->id); ?>" 
                       id="product_<?php echo e($product->id); ?>" <?php echo e(is_array(old('product_ids')) && in_array($product->id, old('product_ids')) ? 'checked' : ''); ?>>
                <label class="form-check-label" for="product_<?php echo e($product->id); ?>">
                    <?php echo e($product->name); ?> (<?php echo e(number_format($product->price, 2)); ?> ₽)
                </label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <!-- Комментарий -->
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment"><?php echo e(old('comment')); ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Создать заказ</button>
        <a href="/orders" class="btn btn-secondary">Отмена</a>
    </form>
</div><?php /**PATH /var/www/project/resources/views/createOrder.blade.php ENDPATH**/ ?>