<?php $__env->startSection('title', 'Biz bilan bog\'lanish'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Biz bilan bog'lanish</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Section Start -->
    <section id="contact" class="section">
        <div class="contact-form">
            <div class="container">
                <div class="row contact-form-area">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="contact-block">
                            <h2>Xabar yo'llash</h2>

                            <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php if(session()->has('sent_successfully')): ?>
                                <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('sent_successfully')); ?></div>
                            <?php endif; ?>

                            <form id="contactForm" method="post" action="<?php echo e(route('post_contact')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="fio" placeholder="To'liq ismingiz" required data-error="To'liq ism to'ldirilishi shart">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Tel.raqamingiz" id="phone" class="form-control phone" name="phone" required data-error="Tel raqamingiz kiritilishi shart">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Mavzu" id="msg_subject" class="form-control" name="subject" required data-error="Mavzu kiritilishi shart">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" name="message" placeholder="Xabar" rows="5" data-error="Xabar matni kiritilishi shart" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="submit-button">
                                            <button class="btn btn-common" type="submit">Jo'natish</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="contact-right-area wow fadeIn">
                            <h2>Biz bilan bog'lanish</h2>
                            <div class="contact-info">
                                <div class="single-contact">
                                    <div class="contact-icon">
                                        <i class="lni-map-marker"></i>
                                    </div>
                                    <p>Manzil: Toshkent shahri, Yunusobod tumani, 11/2/121</p>
                                </div>
                                <div class="single-contact">
                                    <div class="contact-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <p><a href="mailto:hello@tom.com">El.manzil: info@geodezist.uz</a></p>
                                </div>
                                <div class="single-contact">
                                    <div class="contact-icon"><i class="lni-phone-handset"></i>
                                    </div>
                                    <p><a href="#">Ishonch telefoni: +998 97 432 14 00</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="conatiner-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004080.414077152!2d-104.65693512785852!3d37.27559283318413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1530855407925" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <style>
        .with-errors {
            color: darkred;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/contact.blade.php ENDPATH**/ ?>