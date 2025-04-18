<?php

namespace App\Providers;

use App\Models\Award;
use App\Models\Certification;
use App\Models\CustomSection;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Reference;
use App\Models\UserSkill;
use App\Models\Resume;
use App\Models\ResumeDetail;
use App\Observers\ResumeDetailObserver;

use Illuminate\Support\ServiceProvider;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;
use Illuminate\Support\Facades\Route;
use App\Repositories\AwardRepository;
use App\Repositories\CertificationRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\ResumeRepository;
use App\Repositories\EducationRepository;
use App\Repositories\DigitalSignatureRepository;
use App\Repositories\ReferenceRepository;
use App\Repositories\MediaRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\UserRepository;
use App\Repositories\ServiceRepository;

use App\Repositories\UserServiceRepository;
use App\Repositories\OrderRepository;
use App\Repositories\CustomSectionRepository;
use App\Repositories\CartRepository;
use App\Repositories\CoverLetterRepository;
use App\Repositories\SummaryRepository;
use App\Repositories\ResumeHeaderRepository;
use App\Repositories\AuthRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\PortfolioRepository;

use App\Repositories\BlogRepository;

use App\Repositories\Interfaces\EducationRepositoryInterface;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;
use App\Repositories\Interfaces\AwardRepositoryInterface;
use App\Repositories\Interfaces\CertificationRepositoryInterface;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use App\Repositories\Interfaces\ResumeRepositoryInterface;
use App\Repositories\Interfaces\ReferenceRepositoryInterface;
use App\Repositories\Interfaces\DigitalSignatureRepositoryInterface;
use App\Repositories\Interfaces\MediaRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

use App\Repositories\Interfaces\UserServiceRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\CustomSectionRepositoryInterface;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Repositories\Interfaces\CoverLetterRepositoryInterface;
use App\Repositories\Interfaces\SummaryRepositoryInterface;
use App\Repositories\Interfaces\ResumeHeaderRepositoryInterface;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\PortfolioRepositoryInterface;

use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Repositories\Interfaces\PageSectionRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\PageSectionRepository;

use App\Repositories\Interfaces\PackageRepositoryInterface;
use App\Repositories\Interfaces\PackageSubscribeRepositoryInterface;
use App\Repositories\PackageRepository;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\SuccessStoryRepositoryInterface;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use App\Repositories\PackageSubscribeRepository;
use App\Repositories\SuccessStoryRepository;
use App\Repositories\TestimonialRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExceptionHandlerContract::class, Handler::class);
        $this->app->bind(EducationRepositoryInterface::class, EducationRepository::class);
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
        $this->app->bind(ResumeRepositoryInterface::class, ResumeRepository::class);
        $this->app->bind(LanguageRepositoryInterface::class, LanguageRepository::class);
        $this->app->bind(CertificationRepositoryInterface::class, CertificationRepository::class);
        $this->app->bind(AwardRepositoryInterface::class, AwardRepository::class);
        $this->app->bind(ReferenceRepositoryInterface::class, ReferenceRepository::class);
        $this->app->bind(DigitalSignatureRepositoryInterface::class, DigitalSignatureRepository::class);
        $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

        $this->app->bind(UserServiceRepositoryInterface::class, UserServiceRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(CustomSectionRepositoryInterface::class, CustomSectionRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(CoverLetterRepositoryInterface::class, CoverLetterRepository::class);
        $this->app->bind(SummaryRepositoryInterface::class, SummaryRepository::class);
        $this->app->bind(ResumeHeaderRepositoryInterface::class, ResumeHeaderRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(PortfolioRepositoryInterface::class, PortfolioRepository::class);

        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(PageSectionRepositoryInterface::class, PageSectionRepository::class);


        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(PackageSubscribeRepositoryInterface::class, PackageSubscribeRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(SuccessStoryRepositoryInterface::class, SuccessStoryRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        Experience::observe(ResumeDetailObserver::class);
        Education::observe(ResumeDetailObserver::class);
        Language::observe(ResumeDetailObserver::class);
        Reference::observe(ResumeDetailObserver::class);
        Award::observe(ResumeDetailObserver::class);
        Certification::observe(ResumeDetailObserver::class);
        CustomSection::observe(ResumeDetailObserver::class);
        UserSkill::observe(ResumeDetailObserver::class);
        ResumeDetail::observe(ResumeDetailObserver::class);
    }
}
