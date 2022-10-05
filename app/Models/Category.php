<?php

    namespace App\Models;

    use DateTimeInterface;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Image\Exceptions\InvalidManipulation;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Category extends Model implements HasMedia
    {
        use SoftDeletes;
        use InteractsWithMedia;
        use HasFactory;

        public const STATUS_SELECT = [
            'Active' => 'Active',
            'Not Active' => 'Not Active',
        ];


        public $table = 'categories';

        protected $with=['media'];

        protected $appends = [
            'image',
        ];

        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $fillable = [
            'name',
            'slug',
            'status',
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        /**
         * @throws InvalidManipulation
         */
        public function registerMediaConversions(Media $media = null): void
        {
            $this->addMediaConversion('thumb')->fit('crop', 300, 300);
            $this->addMediaConversion('preview');
        }

        public function getImageAttribute()
        {
            $file = $this->getMedia('image')->last();
            if ($file) {
                $file->url = $file->getUrl();
                $file->thumbnail = $file->getUrl('thumb');
                $file->preview = $file->getUrl('preview');
            }

            return $file;
        }

        public function products(): HasMany
        {
            return $this->hasMany(Product::class, 'category_id');
        }

        protected function serializeDate(DateTimeInterface $date): string
        {
            return $date->format('Y-m-d H:i:s');
        }
    }
