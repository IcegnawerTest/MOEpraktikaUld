        

        <?php $__env->startSection('title', $product->title); ?>
        <?php $__env->startSection('content'); ?>
        <div class="mainDetail">
        <h2>
            <?php echo e($product->name); ?>

        </h2>
        <p class="img">
            <img src="<?php echo e($product->type); ?>" alt="Изображение отсутствует">
        </p>
        <p class="description">
            <?php echo e($product->description); ?>

        </p>
        <p class="coordinates">
           Координаты объекта: <?php echo e($product->composition); ?>

        </p>
        <p>
            <a href="<?php echo e(route('products')); ?>">
                <button>Вернуться к списку</button>
            </a>

    <?php if(auth()->guard()->guest()): ?>
            Зарегистрируйтесь для заказа товара!
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
            <?php
                $productCart = 0;
            ?>
        <?php $__currentLoopData = $cartProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- перебрать все товары корзины -->
            <?php
            $productCartId = $cP->product_id; //Получить айди товара -->
            $productId = $product->id; //Получить айди товара страницы -->
            ?>

            <?php if($productCartId != $productId): ?> <!-- Если айди не одинаковы, то.. -->
                <?php
                $productCart = false;
                ?>
            <?php else: ?>
                <?php
                $productCart = true;
                ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($productCart === true): ?>
            <p>Товар в корзине</p>
            <a href="<?php echo e(route('cart.index')); ?>"><button>Перейти в корзину</button></a>
        <?php else: ?>
        <form action="<?php echo e(route('cart.add')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
            <input min="1" max="50" type="number" name="quantity" value="1" placeholder="Кол-во" required>
            <button>Добавить в корзину</button>
        </form>
        <?php endif; ?>
    <?php endif; ?>
        </p>
        </div>
        <?php $__env->stopSection(); ?>



<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\BakeryUld\resources\views/detail.blade.php ENDPATH**/ ?>