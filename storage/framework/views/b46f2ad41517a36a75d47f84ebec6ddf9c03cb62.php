<?php $__env->startSection('content'); ?>
<div class="flexForm">
<div class="mainProductAdd">
    <form action="<?php echo e(route('admin.updatePost')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
        <input type="text" value="<?php echo e($product->name); ?>" name="name" placeholder="Имя" required>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <select id="type" name="type">
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($typ->id); ?>" <?php echo e($typ->id == $product->type_id ? 'selected' : ''); ?>><?php echo e($typ->type); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        !<?php echo e($message); ?>

        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input type="text" value="<?php echo e($product->img); ?>" name="img" placeholder="Ссылка на картинку" required>
        <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <textarea name="description" cols="100" rows="10" placeholder="Описание" required><?php echo e($product->description); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <input type="text" name="composition" value="<?php echo e($product->composition); ?>" placeholder="Состав" required>
        <?php $__errorArgs = ['composition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <input type="number" name="price" value="<?php echo e($product->price); ?>" placeholder="Цена" required>
        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			!<?php echo e($message); ?>

		<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <button>Изменить</button>
    </form>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OSPanel\domains\BakeryUld\resources\views/admin/update.blade.php ENDPATH**/ ?>