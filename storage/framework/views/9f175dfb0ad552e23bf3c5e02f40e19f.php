<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($pageTitle); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="<?php echo e(route('home')); ?>" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="<?php echo e(route('employees.index')); ?>" class="nav-link active">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="<?php echo e(route('profile')); ?>" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>

    <form action="<?php echo e(route('employees.update', ['employee' => $employee->employee_id])); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
        <div class="container-sm my-5">
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-4 border">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Detail Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " type="text" name="firstName" id="firstName" value="<?php echo e($employee->firstname); ?>" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " type="text" name="lastName" id="lastName" value="<?php echo e($employee->lastname); ?>" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " type="text" name="email" id="email" value="<?php echo e($employee->email); ?>" placeholder="Enter Email">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input class="form-control <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " type="number" name="age" id="age" value="<?php echo e($employee->age); ?>" placeholder="Enter Age">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="age" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                    <option value="<?php echo e($employee->position_id); ?>"><?php echo e($employee->code.' - '.$employee->position_name); ?></option>
                                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($position->name !== $employee->position_name): ?>
                                        <option value="<?php echo e($position->id); ?>" 
                                            <?php echo e(old('position') == $position->id ? 'selected' : ''); ?>>
                                            <?php echo e($position->code.' - '.$position->name); ?>

                                        </option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-6 d-grid">
                            <!-- button cancel: ketika cancel akan langsung kembali ke employees  -->
                            <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <!-- button submit untuk update data yg diubah -->
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>
</html>

<?php /**PATH /Users/novimonica/Documents/SEMESTER 4/Pemrograman Framework/Praktikum/MODUL_4/ControllerView/resources/views/employee/edit.blade.php ENDPATH**/ ?>