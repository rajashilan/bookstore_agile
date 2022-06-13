<div>
    <div class='container-fluid px-4'>
        <div class="container">
            <div class='card mt-4'>
                <div class='card-header'>
                    <h2>All Books
                        <a href="<?php echo e(route('addbook')); ?>" class='btn btn-primary btn-sm float-end' style='marginTop:8px'>Add Books</a>
                    </h2>
                </div>
                <div class='card-body'>
                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id #</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Publication Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $xCount = 1;
                        ?>
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($xCount); ?></th>
                                <td><img src="assets\uploaded_images\books\<?php echo e($val->image); ?>" style="width: 50px; height: 50px;" /></td>
                                <td><?php echo e($val->title); ?></td>
                                <td><?php echo e($val->quantity); ?></td>
                                <td><?php echo e($val->retail_price); ?></td>
                                <td><?php echo e($val->category); ?></td>
                                <td><?php echo e($val->publication_date); ?></td>
                                <td></td>
                            </tr>
                            <?php
                                $xCount++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Laragon\www\agiledev\resources\views/livewire/admin-list-book-component.blade.php ENDPATH**/ ?>