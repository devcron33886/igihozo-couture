<?php

    namespace App\Models;

    use Cknow\Money\Money;
    use DateTimeInterface;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Image\Exceptions\InvalidManipulation;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Product extends Model implements HasMedia
    {
        use SoftDeletes;
        use InteractsWithMedia;
        use HasFactory;

        public const STATUS_SELECT = [
            '0' => 'Not Available',
            '1' => 'Available',
        ];

        public $table = 'products';

        protected $appends = [
            'image',
        ];

        protected $with=['category','media'];

        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $fillable = [
            'name',
            'slug',
            'price',
            'size',
            'stock',
            'status',
            'category_id',
            'description',
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

        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('default')
                ->useFallbackUrl(url('/storage/noimage.png'));
        }

        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class, 'category_id');
        }

        public function formattedPrice(): Money
        {
            return Money::RWF($this->price);
        }

        protected function serializeDate(DateTimeInterface $date): string
        {
            return $date->format('Y-m-d H:i:s');
        }
    }
