<?php

use App\Http\Controllers\Api\v1\Admin\PageController as AdminPageController;
use App\Http\Controllers\Api\v1\Admin\PageSectionController as AdminPageSectionController;
use App\Http\Controllers\Api\v1\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\AwardController;
use App\Http\Controllers\Api\v1\CertificationController;
use App\Http\Controllers\Api\v1\EducationController;
use App\Http\Controllers\Api\v1\ExperienceController;
use App\Http\Controllers\Api\v1\LanguageController;
use App\Http\Controllers\Api\v1\ReferenceController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\OrderController;

use App\Http\Controllers\Api\v1\ResumeController;
use App\Http\Controllers\Api\v1\CustomSectionController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\CoverLetterController;
use App\Http\Controllers\Api\v1\SummaryController;
use App\Http\Controllers\Api\v1\ResumeHeaderController;
use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\PortfolioController;

use App\Http\Controllers\Api\v1\MediaController;
use App\Http\Controllers\Api\v1\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\v1\Admin\ServiceController;
use App\Http\Controllers\Api\v1\Admin\SuccessStoryController as AdminSuccessStoryController;
use App\Http\Controllers\Api\v1\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Api\v1\Admin\UserServiceController;
use App\Http\Controllers\Api\v1\PageController;
use App\Http\Controllers\Api\v1\PageSectionController;
use App\Http\Controllers\Api\v1\Admin\SettingController;
use App\Http\Controllers\Api\v1\BlogController;
use App\Http\Controllers\Api\v1\PackageController;
use App\Http\Controllers\Api\v1\PackageSubscribeController;
use App\Http\Controllers\Api\v1\SuccessStoryController;
use App\Http\Controllers\Api\v1\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\CountriesController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;

// Login Route
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware(['throttle']);

// Authorization Code Routes
Route::get('/oauth/authorize', [AuthorizationController::class, 'authorize']);
Route::post('/oauth/authorize', [AuthorizationController::class, 'approve']);
Route::delete('/oauth/authorize', [AuthorizationController::class, 'deny']);



route::group(['prefix' => 'v1'], function () {


    // Public Routes
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:3,1');
    Route::post('/resend-verify-email', [AuthController::class, 'resendVerificationEmail']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/update-password', [AuthController::class, 'updatePassword']);
    Route::post('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
    Route::post('/guest-user', [AuthController::class, 'createGuestUser']);

    // Protected Routes
    Route::middleware(['auth:api'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::middleware(['role:User'])->prefix('user')->group(function () {
            Route::controller(UserController::class)->group(function () {

                Route::get('/profile', 'index');
                Route::get('/get-permission', 'get_permission');
                Route::get('/profile/technical-skills', 'technical_skills');
                Route::get('/profile/soft-skills', 'soft_skills');
                Route::get('/profile/experiences', 'experiences');
                Route::get('/profile/education', 'educations');
                Route::get('/profile/awards', 'awards');
                Route::get('/profile/references', 'references');
                Route::get('/profile/languages', 'languages');
                Route::get('/profile/certificates', 'certificates');

                // updates
                Route::put('/profile/update', 'update');
                Route::put('/profile/change-password', 'change_password');
                Route::put('/profile/change-email', 'change_email');
                Route::put('/profile/update-summary', 'update_summary');
                Route::post('/profile/technical-skills', 'add_technical_skills');

                Route::post('/profile/soft-skills', 'add_soft_skills');
            });

            // Order
            Route::controller(OrderController::class)->group(function () {
                Route::get('/orders/{userId?}', 'getUserOrders');
                Route::post('/order/store', 'store');
                Route::get('/order/{id}', 'show');
                Route::put('/order/{orderId}/services/revision', 'updateServiceRevision');
            });
        });

        // Education Crud
        Route::controller(EducationController::class)->group(function () {
            Route::get('/educations', 'index');
            Route::post('/education/store', 'store');
            Route::get('/education/{id}', 'show');
            Route::put('/education/update/{id}', 'update');
            Route::delete('/education/{id}', 'destroy');
        });

        // Award Crud
        Route::controller(AwardController::class)->group(function () {
            Route::get('/awards', 'index');
            Route::post('/award/store', 'store');
            Route::get('/award/{id}', 'show');
            Route::put('/award/update/{id}', 'update');
            Route::delete('/award/{id}', 'destroy');
        });

        // Experience Crud
        Route::controller(ExperienceController::class)->group(function () {
            Route::get('/experiences',  'index');
            Route::post('/experience/store',  'store');
            Route::get('/experience/{id}',  'show');
            Route::put('/experience/update/{id}',  'update');
            Route::delete('/experience/{id}',  'destroy');
        });

        // Reference Crud
        Route::controller(ReferenceController::class)->group(function () {
            Route::get('/references', 'index');
            Route::post('/reference/store', 'store');
            Route::get('/reference/{id}', 'show');
            Route::put('/reference/update/{id}', 'update');
            Route::delete('/reference/{id}', 'destroy');
        });

        // Language Crud
        Route::controller(LanguageController::class)->group(function () {
            Route::get('/languages', 'index');
            Route::post('/language/store', 'store');
            Route::get('/language/{id}', 'show');
            Route::put('/language/update/{id}', 'update');
            Route::delete('/language/{id}', 'destroy');
        });

        // Certificate Crud
        Route::controller(CertificationController::class)->group(function () {
            Route::get('/certificates', 'index');
            Route::post('/certificate/store', 'store');
            Route::get('/certificate/{id}', 'show');
            Route::put('/certificate/update/{id}', 'update');
            Route::delete('/certificate/{id}', 'destroy');
        });

        Route::controller(UserController::class)->group(function () {
            Route::post('/technical-skills', 'add_technical_skills');
            Route::post('/soft-skills', 'add_soft_skills');
            Route::get('/technical-skills', 'get_technical_skills');
            Route::get('/soft-skills', 'get_soft_skills');
        });

        // Resume Route
        Route::controller(ResumeController::class)->group(function () {
            Route::get('/resumes', 'index');
            Route::post('/resume/store', 'store');
            Route::get('/resume/{id}', 'show');
            Route::put('/resume/update/{id}', 'update');
            Route::delete('/resume/{id}', 'destroy');
        });

        // Cover Letter Route
        Route::controller(CoverLetterController::class)->group(function () {
            Route::get('/cover-letters', 'index');
            Route::post('/cover-letter/store', 'store');
            Route::get('/cover-letter/{id}', 'show');
            Route::put('/cover-letter/update/{id}', 'update');
            Route::delete('/cover-letter/{id}', 'destroy');
        });

        // Custom Section Crud
        Route::controller(CustomSectionController::class)->group(function () {
            Route::get('/custom-sections', 'index');
            Route::post('/custom-section/store', 'store');
            Route::get('/custom-section/{id}', 'show');
            Route::put('/custom-section/update/{id}', 'update');
            Route::delete('/custom-section/{id}', 'destroy');
        });

        // Cart Route
        Route::controller(CartController::class)->group(function () {
            Route::post('/cart/store', 'store');
            Route::delete('/cart/{id}', 'destroy');
        });

        // Header Route
        Route::controller(ResumeHeaderController::class)->group(function () {
            Route::post('/resume-header/store', 'store');
            Route::put('/resume-header/update/{id}', 'update');
            Route::get('/resume-header/{id}', 'show');
        });

        // Summary Crud
        Route::controller(SummaryController::class)->group(function () {
            Route::get('/summaries', 'index');
            Route::post('/summary/store', 'store');
            Route::get('/summary/{id}', 'show');
            Route::put('/summary/update/{id}', 'update');
            Route::delete('/summary/{id}', 'destroy');
        });


        // Pages Routes
        Route::controller(PageController::class)->group(function () {
            Route::get('/pages', 'index');
            Route::get('/page/{id}', 'show');
        });

        //subscribe Package and usaged of package routes
        Route::controller(PackageSubscribeController::class)->group(function () {
            Route::get('/package/subscribe', 'subscribe');
            Route::get('/package/user-detailed/add-tries', 'updateUsage');
            Route::get('/user-details', 'userDetails');
        });


        // Blogs Management Route
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blogs', 'index');
            Route::get('/blog/{id}', 'show');
        });

        // Success Stories Management routes
        Route::controller(SuccessStoryController::class)->group(function () {
            Route::get('/success/stories', 'index');
            Route::post('/success/story/store', 'store');
            Route::get('/success/story/{id}', 'show');
            Route::put('/success/story/update/{id}', 'update');
            Route::delete('/success/story/{id}', 'destroy');
        });

        // Testimonial and Reviews Management routes
        Route::controller(TestimonialController::class)->group(function () {
            Route::get('/testimonials', 'index');
            Route::post('/testimonial/store', 'store');
            Route::get('/testimonial/{id}', 'show');
            Route::put('/testimonial/update/{id}', 'update');
            Route::delete('/testimonial/{id}', 'destroy');
        });

        // Project Crud
        Route::controller(ProjectController::class)->group(function () {
            Route::get('/projects', 'index');
            Route::post('/project/store', 'store');
            Route::get('/project/{id}', 'show');
            Route::put('/project/update/{id}', 'update');
            Route::delete('/project/{id}', 'destroy');
        });

        // Portfolio Crud
        Route::controller(PortfolioController::class)->group(function () {
            Route::get('/portfolio', 'index');
            Route::post('/portfolio/store', 'store');
            Route::get('/portfolio/{id}', 'show');
            Route::put('/portfolio/update/{id}', 'update');
            Route::delete('/portfolio/{id}', 'destroy');
        });

        // Admin routes
        Route::group(['prefix' => 'admin', 'middleware' => ['checkUserRole:Admin']], function () {
            Route::controller(AdminUserController::class)->group(function () {
                Route::get('/users', 'index');
                Route::post('/user/store', 'store');
                Route::get('/user/{id}', 'show');
                Route::put('/user/update/{id}', 'update');
                Route::delete('/user/{id}', 'destroy');
                Route::get('/user-creation-counts', 'getUserCreationCountsLastWeek');
                Route::get('/users/counts', 'getUserCounts');
            });

            Route::controller(ServiceController::class)->group(function () {
                Route::get('/services', 'index');
                Route::post('/service/store', 'store');
                Route::get('/service/{id}', 'show');
                Route::put('/service/update/{id}', 'update');
                Route::delete('/service/{id}', 'destroy');
            });

            Route::controller(UserServiceController::class)->group(function () {
                Route::get('/user-services', 'index');
                Route::post('/user-service/store', 'store');
                Route::get('/user-service/{id}', 'show');
                Route::put('/user-service/update/{id}', 'update');
                Route::delete('/user-service/{id}', 'destroy');
            });

            Route::controller(MediaController::class)->group(function () {
                Route::get('/media', 'index');
                Route::post('/media/store', 'store');
                Route::get('/media/{id}', 'show');
                Route::put('/media/update/{id}', 'update');
                Route::delete('/media/{id}', 'destroy');
            });

            // Pages Routes
            Route::controller(AdminPageController::class)->group(function () {
                Route::get('/pages', 'index');
                Route::post('/page/store', 'store');
                Route::get('/page/{id}', 'show');
                Route::put('/page/update/{id}', 'update');
                Route::delete('/page/{id}', 'destroy');
            });

            // Pages Sections
            Route::controller(AdminPageSectionController::class)->group(function () {
                Route::get('/pages/sections', 'index');
                Route::post('/page/section/store', 'store');
                Route::get('/page/section/{id}', 'show');
                Route::put('/page/section/update/{id}', 'update');
                Route::delete('/page/section/{id}', 'destroy');
            });

            Route::controller(SettingController::class)->group(function () {
                Route::get('/settings', 'index');
                Route::post('/setting/update', 'update');
                Route::delete('/setting/{id}', 'destroy');
            });

            // packages routes
            Route::controller(PackageController::class)->group(function () {
                Route::get('/packages', 'index');
                Route::post('/package/store', 'store');
                Route::get('/package/{id}', 'show');
                Route::put('/package/update/{id}', 'update');
                Route::delete('/package/{id}', 'destroy');
            });

            // Blog Management routes
            Route::controller(AdminBlogController::class)->group(function () {
                Route::get('/blogs', 'index');
                Route::post('/blog/store', 'store');
                Route::get('/blog/{id}', 'show');
                Route::put('/blog/update/{id}', 'update');
                Route::delete('/blog/{id}', 'destroy');
            });

            // Success Stories Management routes
            Route::controller(AdminSuccessStoryController::class)->group(function () {
                Route::get('/success/stories', 'index');
                Route::post('/success/story/store', 'store');
                Route::get('/success/story/{id}', 'show');
                Route::put('/success/story/update/{id}', 'update');
                Route::delete('/success/story/{id}', 'destroy');
            });

            // Testimonial and Reviews Management routes
            Route::controller(AdminTestimonialController::class)->group(function () {
                Route::get('/testimonials', 'index');
                Route::post('/testimonial/store', 'store');
                Route::get('/testimonial/{id}', 'show');
                Route::put('/testimonial/update/{id}', 'update');
                Route::delete('/testimonial/{id}', 'destroy');
            });
        });
    });
});
