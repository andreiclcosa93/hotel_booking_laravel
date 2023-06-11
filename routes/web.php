<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\BookingController;

// ============================================================

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminForgotController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminDatewiseRoomController;



// =============================================================
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerProfileController;
use App\Http\Controllers\Customer\CustomerOrderController;


// Front ##########################################################################################################################

Route::get('/', [HomeController::class, 'index'])->name('home');

// About ##########################################################################################################################
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Blog ##########################################################################################################################
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/post/{id}', [BlogController::class, 'single_post'])->name('post');

// Photo Gallery ##########################################################################################################################
Route::get('/photo', [PhotoController::class, 'index'])->name('photo');

// Photo Video ##########################################################################################################################
Route::get('/video', [VideoController::class, 'index'])->name('video');

// Faq ##########################################################################################################################
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Terms & Cond. ##########################################################################################################################
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');

// Contact ##########################################################################################################################
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Contact ##########################################################################################################################
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_send_email');

// Subscribe ##########################################################################################################################
Route::post('/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber_send_email');

Route::get('/subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber_verify');

// Rooms ##########################################################################################################################
Route::get('/room', [RoomController::class, 'index'])->name('room');
// room detail view
Route::get('/room/{id}', [RoomController::class, 'single_room'])->name('room_detail');

// Check-in/out ##########################################################################################################################
Route::post('/booking/submit', [BookingController::class, 'cart_submit'])->name('cart_submit');

// view blade cart page
Route::get('/cart', [BookingController::class, 'cart_view'])->name('cart');

// delete cart
Route::get('/cart/delete/{id}', [BookingController::class, 'cart_delete'])->name('cart_delete');

// view blade checkout
Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');

// payment
Route::post('/payment', [BookingController::class, 'payment'])->name('payment');
Route::get('/payment/paypal/{price}', [BookingController::class, 'paypal'])->name('paypal');

Route::post('/payment/stripe/{price}', [BookingController::class, 'stripe'])->name('stripe');

#########################################################################################################################################

// Route::get('/', function () {
//     return view('admin.login');
// });

// Route::get('/dashboard', function () {
//     return view('admin.home');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#########################################################################################################################################

// Admin
// view blade
Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard')->middleware('admin:admin');

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');

Route::get('/admin/login-admin', [AdminLoginController::class, 'login'])->name('admin_login');

Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');

Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('forget_password');

Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');

Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');



Route::group(['middleware' =>['admin:admin']], function(){

    // My Profile ##########################################################################################################################
    // view blade
    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');

    // update profile
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

    // view blade customers
    Route::get('/admin/customer-view', [AdminCustomerController::class, 'index'])->name('admin_customer');

    // change status
    Route::get('/admin/customer/change-status/{id}', [AdminCustomerController::class, 'change_status'])->name('admin_customer_change_status');

    // view blade order
    Route::get('/admin/order/view', [AdminOrderController::class, 'index'])->name('admin_order_view');

    // admin view invoice
    Route::get('/admin/order/invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin_invoice');

    // admin delete order
    Route::get('/admin/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin_order_delete');

    // admin settings
    Route::get('/admin/settings', [AdminSettingController::class, 'setting'])->name('admin_setting');

    // update setting
    Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');

    // Available Rooms
    Route::get('/admin/datewise-rooms', [AdminDatewiseRoomController::class, 'index'])->name('admin_datewise_rooms');

      // update Available Rooms
    Route::post('/admin/datewise-rooms/submit', [AdminDatewiseRoomController::class, 'show'])->name('admin_datewise_rooms_submit');


});

// customer
##########################################################################################################################
Route::get('/login', [CustomerAuthController::class, 'login'])->name('customer_login');
Route::post('/login-submit', [CustomerAuthController::class, 'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer_logout');
Route::get('/signup', [CustomerAuthController::class, 'signup'])->name('customer_signup');
Route::post('/signup-submit', [CustomerAuthController::class, 'signup_submit'])->name('customer_signup_submit');
Route::get('/signup-verify/{email}/{token}', [CustomerAuthController::class, 'signup_verify'])->name('customer_signup_verify');

Route::get('/forget-password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('/forget-password-submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password'])->name('customer_reset_password');
Route::post('/reset-password-submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer_reset_password_submit');

Route::group(['middleware' => ['customer:customer']], function(){

    // Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard')->middleware('admin:admin');
    Route::get('/customer/home', [CustomerHomeController::class, 'index'])->name('customer_home');
    Route::get('/customer/edit-profile', [CustomerProfileController::class, 'index'])->name('customer_profile');
    Route::post('/customer/edit-profile-submit', [CustomerProfileController::class, 'profile_submit'])->name('customer_profile_submit');
    Route::get('/customer/order/view', [CustomerOrderController::class, 'index'])->name('customer_order_view');
    Route::get('/customer/invoice/{id}', [CustomerOrderController::class, 'invoice'])->name('customer_invoice');

});


// Slide ##########################################################################################################################
// view blade
Route::get('admin/slide/view', [AdminSlideController::class, 'index'])->name('admin_slide_view');
// add view blade slide
Route::get('admin/slide/add', [AdminSlideController::class, 'slideView'])->name('admin_slide_add');
// create slide
Route::post('admin/slide/create', [AdminSlideController::class, 'slideCreate'])->name('admin_slide_store');
// edit view blade
Route::get('admin/slide/edit/{id}', [AdminSlideController::class, 'slideEdit'])->name('admin_slide_edit');
// update slide
Route::post('admin/slide/update/{id}', [AdminSlideController::class, 'slideUpdate'])->name('admin_slide_update');
// delete slide
Route::get('admin/slide/delete/{id}', [AdminSlideController::class, 'slideDelete'])->name('admin_slide_delete');


// Feature ##########################################################################################################################
// view blade
Route::get('admin/feature/view', [AdminFeatureController::class, 'index'])->name('admin_feature_view');
// add view blade
Route::get('admin/feature/add', [AdminFeatureController::class, 'featureAdd'])->name('admin_feature_add');
// create feature
Route::post('admin/feature/create', [AdminFeatureController::class, 'featureCreate'])->name('admin_feature_store');
// edit view blade
Route::get('admin/feature/edit/{id}', [AdminFeatureController::class, 'featureEdit'])->name('admin_feature_edit');
// update feature
Route::post('admin/feature/update/{id}', [AdminFeatureController::class, 'featureUpdate'])->name('admin_feature_update');
// delete feature
Route::get('admin/feature/delete/{id}', [AdminFeatureController::class, 'featureDelete'])->name('admin_feature_delete');


// Testimonial ##########################################################################################################################
// view blade
Route::get('admin/testimonial/view', [AdminTestimonialController::class, 'viewBladeTestimonial'])->name('admin_testimonial_view');
// add view blade
Route::get('admin/testimonial/add', [AdminTestimonialController::class, 'testimonialAdd'])->name('admin_testimonial_add');
// create testimonial
Route::post('admin/testimonial/create', [AdminTestimonialController::class, 'testimonialCreate'])->name('admin_testimonial_store');
// edit view blade
Route::get('admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'testimonialEdit'])->name('admin_testimonial_edit');
// update testimonial
Route::post('admin/testimonial/update/{id}', [AdminTestimonialController::class, 'testimonialUpdate'])->name('admin_testimonial_update');
// delete testimonial
Route::get('admin/testimonial/delete/{id}', [AdmintestimonialController::class, 'testimonialDelete'])->name('admin_testimonial_delete');



// Post  ##########################################################################################################################
// view blade
Route::get('admin/post/view', [AdminPostController::class, 'viewBladePost'])->name('admin_post_view');
// add view post
Route::get('admin/post/add', [AdminPostController::class, 'postAdd'])->name('admin_post_add');
// create post
Route::post('admin/post/create', [AdminPostController::class, 'postCreate'])->name('admin_post_store');
// edit view post
Route::get('admin/post/edit/{id}', [AdminPostController::class, 'postEdit'])->name('admin_post_edit');
// update post
Route::post('admin/post/update/{id}', [AdminPostController::class, 'postUpdate'])->name('admin_post_update');
// delete post
Route::get('admin/post/delete/{id}', [AdminPostController::class, 'postDelete'])->name('admin_post_delete');


// Photo  ##########################################################################################################################
// view blade
Route::get('admin/photo/view', [AdminPhotoController::class, 'viewBladePhoto'])->name('admin_photo_view');
// add view photo
Route::get('admin/photo/add', [AdminPhotoController::class, 'photoAdd'])->name('admin_photo_add');
// create photo
Route::post('admin/photo/create', [AdminPhotoController::class, 'photoCreate'])->name('admin_photo_store');
// edit view photo
Route::get('admin/photo/edit/{id}', [AdminPhotoController::class, 'photoEdit'])->name('admin_photo_edit');
// update photo
Route::post('admin/photo/update/{id}', [AdminPhotoController::class, 'photoUpdate'])->name('admin_photo_update');
// delete photo
Route::get('admin/photo/delete/{id}', [AdminPhotoController::class, 'photoDelete'])->name('admin_photo_delete');


// Video  ##########################################################################################################################
// view blade
Route::get('admin/video/view', [AdminVideoController::class, 'viewBladeVideo'])->name('admin_video_view');
// add view video
Route::get('admin/video/add', [AdminVideoController::class, 'videoAdd'])->name('admin_video_add');
// create video
Route::post('admin/video/create', [AdminVideoController::class, 'videoCreate'])->name('admin_video_store');
// edit view video
Route::get('admin/video/edit/{id}', [AdminVideoController::class, 'videoEdit'])->name('admin_video_edit');
// update video
Route::post('admin/video/update/{id}', [AdminVideoController::class, 'videoUpdate'])->name('admin_video_update');
// delete video
Route::get('admin/video/delete/{id}', [AdminVideoController::class, 'videoDelete'])->name('admin_video_delete');


// Faq  ##########################################################################################################################
// view blade
Route::get('admin/faq/view', [AdminFaqController::class, 'viewBladeFaq'])->name('admin_faq_view');
// add view faq
Route::get('admin/faq/add', [AdminFaqController::class, 'faqAdd'])->name('admin_faq_add');
// create faq
Route::post('admin/faq/create', [AdminFaqController::class, 'faqCreate'])->name('admin_faq_store');
// edit view faq
Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'faqEdit'])->name('admin_faq_edit');
// update faq
Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'faqUpdate'])->name('admin_faq_update');
// delete faq
Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'faqDelete'])->name('admin_faq_delete');


// Page About  ##########################################################################################################################
// view blade
Route::get('admin/page/about', [AdminPageController::class, 'about'])->name('admin_page_about');
// edit page bout
Route::post('admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update');


// Terms  ##########################################################################################################################
// view blade
Route::get('admin/page/terms', [AdminPageController::class, 'terms'])->name('admin_page_terms');
// edit page bout
Route::post('admin/page/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_page_terms_update');


// Contact  ##########################################################################################################################
// view blade
Route::get('admin/page/contact', [AdminContactController::class, 'contact'])->name('admin_page_contact');
// edit page about
Route::post('admin/page/contact/update', [AdminContactController::class, 'contact_update'])->name('admin_page_contact_update');


// Cart  ##########################################################################################################################
// view blade
Route::get('admin/page/cart', [AdminCartController::class, 'cart'])->name('admin_page_cart');
// edit page cart
Route::post('admin/page/cart/update', [AdminCartController::class, 'cart_update'])->name('admin_page_cart_update');


// checkout  ##########################################################################################################################
// view blade
Route::get('admin/page/checkout', [AdminCartController::class, 'checkout'])->name('admin_page_checkout');
// edit page cart
Route::post('admin/page/checkout/update', [AdminCartController::class, 'checkout_update'])->name('admin_page_checkout_update');

// payment  ##########################################################################################################################
// view blade
Route::get('admin/page/payment', [AdminCartController::class, 'payment'])->name('admin_page_payment');
// edit page payment
Route::post('admin/page/payment/update', [AdminCartController::class, 'payment_update'])->name('admin_page_payment_update');


// Subscriber  ##########################################################################################################################
// view blade
Route::get('admin/page/subscriber', [AdminSubscriberController::class, 'show'])->name('admin_subscriber_show');
// send email view blade
Route::get('admin/page/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email');
//send email
Route::post('/admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit');


// Amenities  ##########################################################################################################################
// view blade
Route::get('admin/page/amenities', [AdminAmenityController::class, 'show'])->name('admin_amenities_show');
// add view amenity
Route::get('admin/amenity/add', [AdminAmenityController::class, 'amenityAdd'])->name('admin_amenity_add');
// create amenity
Route::post('admin/amenity/create', [AdminAmenityController::class, 'amenityCreate'])->name('admin_amenity_store');
// edit view amenity
Route::get('admin/amenity/edit/{id}', [AdminAmenityController::class, 'amenityEdit'])->name('admin_amenity_edit');
// update amenity
Route::post('admin/amenity/update/{id}', [AdminAmenityController::class, 'amenityUpdate'])->name('admin_amenity_update');
// delete amenity
Route::get('admin/amenity/delete/{id}', [AdminAmenityController::class, 'amenityDelete'])->name('admin_amenity_delete');


// Rooms  ##########################################################################################################################
// view blade
Route::get('admin/page/rooms', [AdminRoomController::class, 'show'])->name('admin_rooms_show');
// add view amenity
Route::get('admin/room/add', [AdminRoomController::class, 'roomAdd'])->name('admin_room_add');
// create amenity
Route::post('admin/room/create', [AdminRoomController::class, 'roomCreate'])->name('admin_room_store');
// edit view amenity
Route::get('admin/room/edit/{id}', [AdminRoomController::class, 'roomEdit'])->name('admin_room_edit');
// update amenity
Route::post('admin/room/update/{id}', [AdminRoomController::class, 'roomUpdate'])->name('admin_room_update');
// delete amenity
Route::get('admin/room/delete/{id}', [AdminRoomController::class, 'roomDelete'])->name('admin_room_delete');
// photo gallery
Route::get('admin/room/gallery/{id}', [AdminRoomController::class, 'Room_Gallery'])->name('admin_room_gallery');
// update photo gallery
Route::post('admin/room/gallery/update/{id}', [AdminRoomController::class, 'Gallery_Update'])->name('admin_room_gallery_update');
// delete photo gallery
Route::get('admin/room/gallery/delete/{id}', [AdminRoomController::class, 'Gallery_Delete'])->name('admin_room_gallery_delete');

// Forget - Reset Password  ##########################################################################################################################
// view blade
Route::get('/admin/page/forget_password', [AdminForgotController::class, 'forget_password'])->name('admin_page_forget_password');

Route::post('/admin/page/forget_password/update', [AdminForgotController::class, 'forget_password_update'])->name('admin_page_forget_password_update');
// view blade
Route::get('/admin/page/reset_password', [AdminForgotController::class, 'reset_password'])->name('admin_page_reset_password');

Route::post('/admin/page/reset_password/update', [AdminForgotController::class, 'reset_password_update'])->name('admin_page_reset_password_update');



require __DIR__.'/auth.php';
