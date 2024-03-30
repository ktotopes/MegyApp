<?php

namespace App\Rules;

use App\Enum\BlocksType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class BlocksValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($value as $index => $block) {
            if (!isset($block['type'])) {
                $fail("The blocks.{$index}.type field is required.");
            }

            match ($block['type']) {
                BlocksType::Text->value => $this->validateText($block, $index, $fail),
                BlocksType::Image->value => $this->validateImage($block, $index, $fail),
                BlocksType::Video->value => $this->validateVideo($block, $index, $fail),
                default => $fail("The blocks.{$index}.type field is invalid."),
            };
        }
    }

    private function validateText(mixed $block, int $index, Closure $fail): void
    {
        if (!isset($block['texts'])) {
            $fail("The blocks.{$index}.texts field is required.");

            return;
        }

        if (!is_array($block['texts'])) {
            $fail("The blocks.{$index}.texts field must be an array.");

            return;
        }

        foreach ($block['texts'] as $textIndex => $text) {
            if (!isset($text['item'])) {
                $fail("The blocks.{$index}.texts.{$textIndex}.item field is required.");

                return;
            }

            if (!is_string($text['item'])) {
                $fail("The blocks.{$index}.texts.{$textIndex}.item field must be a string.");

                return;
            }
        }
    }

    private function validateImage(mixed $block, int $index, Closure $fail): void
    {
        if (!isset($block['images'])) {
            $fail("The blocks.{$index}.images field is required.");

            return;
        }

        if (!is_array($block['images'])) {
            $fail("The blocks.{$index}.images field must be an array.");

            return;
        }

        foreach ($block['images'] as $imageIndex => $image) {
            if (!isset($image['item'])) {
                $fail("The blocks.{$index}.images.{$imageIndex}.item field is required.");

                return;
            }

            if (!($image['item'] instanceof UploadedFile)) {
                $fail("The blocks.{$index}.images.{$imageIndex}.item field must be an image.");

                return;
            }


            if ($image['item']->getSize() > 1024 * 1000 * 4) {
                $fail("The blocks.{$index}.images.{$imageIndex}.item field must be less than 4Mb. Got: {$image->getSize()} bytes.");

                return;
            }

            if (!in_array(str($image['item']->getClientOriginalExtension())->lower(), ['png', 'jpg', 'gif'])) {
                $fail("The blocks.{$index}.images.{$imageIndex} field must be a file of type: png, jpg, gif.");

                return;
            }
        }
    }

    private function validateVideo(mixed $block, int $index, Closure $fail): void
    {
        if (!isset($block['videos'])) {
            $fail("The blocks.{$index}.videos field is required.");

            return;
        }

        if (!is_array($block['videos'])) {
            $fail("The blocks.{$index}.videos field must be an array.");

            return;
        }

        foreach ($block['videos'] as $videoIndex => $video) {
            if (!isset($video['item'])) {
                $fail("The blocks.{$index}.videos.{$videoIndex}.item field is required.");

                return;
            }

            if (!($video['item'] instanceof UploadedFile)) {
                $fail("The blocks.{$index}.videos.{$videoIndex}.item field must be a video.");

                return;
            }

            if ($video['item']->getSize() > 1024 * 1000 * 10) {
                $fail("The blocks.{$index}.videos.{$videoIndex}.item field must be less than 10Mb. Got: {$video->getSize()} bytes.");

                return;
            }

            if (!in_array(str($video['item']->getClientOriginalExtension())->lower(), ['mp4', 'mov'])) {
                $fail("The blocks.{$index}.videos.{$videoIndex}.item field must be a file of type: mp4, mov.");

                return;
            }
        }
    }


}
