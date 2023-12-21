<?php $__env->startSection('content'); ?>
<?php if(count($cartItems) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <!-- Другие необходимые заголовки таблицы -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e($item->product->img); ?>" alt="<Картинки нет>"></td>

                        <td><?php echo e($item->product->name); ?></td>

                        <td><?php echo e($item->product->description); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.updateQuantity')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="cart_item_id" value="<?php echo e($item->id); ?>">
                                <input min="1" max="50" type="number" name="quantity" value="<?php echo e($item->quantity); ?>" placeholder="Кол-во" required>
                                <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			                    !<?php echo e($message); ?>

		                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <button type="submit">Изменить кол-во</button>
                            </form>
                        </td>
                        <td><a href="<?php echo e(route('detail', ['product' => $item->product_id])); ?>"><button>Подробнее</button></a>
                        <td>
                            <form action="<?php echo e(route('cart.remove',  $item->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit">Удалить</button>
                            </form>
                        </td>
                        <!-- Другие ячейки таблицы с информацией о продукте -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Ваша корзина пуста.</p>
    <?php endif; ?>

    <div>
        <div>
            <form action="<?php echo e(route('application.add')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <button>
                    Заказать
                </button>
            </form>
        </div>
        <div>
            <form action="<?php echo e(route('cart.removeAll')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <button>
                    Очистить корзину
                </button>
            </form>
        </div>

        <input type="hidden" value="<?php echo e($lengthArrayCart = Cookie::get('lengthArrayCart')); ?>"><br>
        <?php for($i=1; $i < $lengthArrayCart+1; $i++): ?>
        <?php echo e($value = Cookie::get('product'.$i)); ?> <br>
        <?php endfor; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pattern.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\BakeryUld\resources\views/cart/index.blade.php ENDPATH**/ ?>