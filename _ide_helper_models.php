<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SubCategory[] $sub_categories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category active()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExperienceLevel
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel active()
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExperienceLevel whereUpdatedAt($value)
 */
	class ExperienceLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $payment_type
 * @property float|null $work_hours
 * @property string $size
 * @property string $visibility
 * @property string $country
 * @property float $rate_from
 * @property float $rate_to
 * @property int|null $experience_level_id
 * @property int|null $sub_category_id
 * @property string|null $metadata
 * @property int $work_length_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $status
 * @property-read \App\Models\User $client
 * @property-read \App\Models\ExperienceLevel|null $experience
 * @property-read mixed $short_desc
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobSkill[] $skills
 * @property-read int|null $skills_count
 * @property-read \App\Models\SubCategory|null $sub_category
 * @property-read \App\Models\WorkLength $work_length
 * @method static \Illuminate\Database\Eloquent\Builder|Job active()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereExperienceLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereWorkHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereWorkLengthId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withLikedByUser()
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobSkill
 *
 * @property int $id
 * @property int $job_id
 * @property int|null $skill_id
 * @property string|null $other_skill
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Skill|null $skill
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill active()
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill whereOtherSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill whereSkillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobSkill whereUpdatedAt($value)
 */
	class JobSkill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Like
 *
 * @property int $id
 * @property string $likeable_type
 * @property int $likeable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLikeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLikeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereUserId($value)
 */
	class Like extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Package
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $description
 * @property int|null $duration
 * @property float $price
 * @property float|null $discount
 * @property string $is_popular
 * @property string $is_subscription
 * @property string $for
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PackagePerk[] $perks
 * @property-read int|null $perks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Package active()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereIsPopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereIsSubscription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 */
	class Package extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PackagePerk
 *
 * @property int $id
 * @property int $package_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Package $package
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackagePerk whereValue($value)
 */
	class PackagePerk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Skill active()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property int|null $category_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 */
	class SubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $images
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $liked_jobs
 * @property-read int|null $liked_jobs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $posted_jobs
 * @property-read int|null $posted_jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User hasLikedJob()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSkill
 *
 * @property-read \App\Models\Skill $skill
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSkill query()
 */
	class UserSkill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WorkLength
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength active()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLength whereUpdatedAt($value)
 */
	class WorkLength extends \Eloquent {}
}

