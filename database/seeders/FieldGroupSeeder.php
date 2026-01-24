<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\FieldGroup;
use Illuminate\Database\Seeder;

class FieldGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        $heroGroup = FieldGroup::create([
            'title' => 'Hero Section',
            'key' => 'hero_section',
            'location' => 'home',
            'order' => 1,
            'active' => true,
        ]);

        Field::create([
            'field_group_id' => $heroGroup->id,
            'label' => 'Hero Title',
            'name' => 'hero_title',
            'type' => 'editor',
            'instructions' => 'Main heading for the hero section',
            'required' => true,
            'default_value' => 'Willkommen bei <br/> Niedrigzins24',
            'order' => 1,
        ]);

        Field::create([
            'field_group_id' => $heroGroup->id,
            'label' => 'Hero Subtitle',
            'name' => 'hero_subtitle',
            'type' => 'textarea',
            'instructions' => 'Subtitle text below the main heading',
            'required' => false,
            'default_value' => 'Ob als Kapitalanlage oder zur Selbstnutzung – wir finden die passende Immobilie für Sie.',
            'order' => 2,
        ]);

        Field::create([
            'field_group_id' => $heroGroup->id,
            'label' => 'Hero Image',
            'name' => 'hero_image',
            'type' => 'image',
            'instructions' => 'Background or featured image for hero section',
            'required' => false,
            'order' => 3,
        ]);

        // About Slides Section
        $aboutSlidesGroup = FieldGroup::create([
            'title' => 'About Slides',
            'key' => 'about_slides',
            'location' => 'home',
            'order' => 2,
            'active' => true,
        ]);

        $aboutSlideRepeater = Field::create([
            'field_group_id' => $aboutSlidesGroup->id,
            'label' => 'About Slides',
            'name' => 'about_slides',
            'type' => 'repeater',
            'instructions' => 'Add multiple slides for the about section',
            'required' => false,
            'order' => 1,
        ]);

        // Sub-fields for repeater
        Field::create([
            'field_group_id' => $aboutSlidesGroup->id,
            'parent_field_id' => $aboutSlideRepeater->id,
            'label' => 'Slide Title',
            'name' => 'slide_title',
            'type' => 'text',
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'field_group_id' => $aboutSlidesGroup->id,
            'parent_field_id' => $aboutSlideRepeater->id,
            'label' => 'Slide Content',
            'name' => 'slide_content',
            'type' => 'editor',
            'required' => false,
            'order' => 2,
        ]);

        Field::create([
            'field_group_id' => $aboutSlidesGroup->id,
            'parent_field_id' => $aboutSlideRepeater->id,
            'label' => 'Slide Image',
            'name' => 'slide_image',
            'type' => 'image',
            'required' => false,
            'order' => 3,
        ]);

        // Stats Section
        $statsGroup = FieldGroup::create([
            'title' => 'Stats Section',
            'key' => 'stats_section',
            'location' => 'home',
            'order' => 3,
            'active' => true,
        ]);

        $statsRepeater = Field::create([
            'field_group_id' => $statsGroup->id,
            'label' => 'Stat Cards',
            'name' => 'stat_cards',
            'type' => 'repeater',
            'instructions' => 'Add statistics cards',
            'required' => false,
            'order' => 1,
        ]);

        Field::create([
            'field_group_id' => $statsGroup->id,
            'parent_field_id' => $statsRepeater->id,
            'label' => 'Stat Number',
            'name' => 'stat_number',
            'type' => 'number',
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'field_group_id' => $statsGroup->id,
            'parent_field_id' => $statsRepeater->id,
            'label' => 'Stat Label',
            'name' => 'stat_label',
            'type' => 'text',
            'required' => true,
            'order' => 2,
        ]);

        Field::create([
            'field_group_id' => $statsGroup->id,
            'parent_field_id' => $statsRepeater->id,
            'label' => 'Stat Icon',
            'name' => 'stat_icon',
            'type' => 'image',
            'required' => false,
            'order' => 3,
        ]);

        // About Us Section
        $aboutUsGroup = FieldGroup::create([
            'title' => 'About Us Section',
            'key' => 'about_us_section',
            'location' => 'home',
            'order' => 4,
            'active' => true,
        ]);

        Field::create([
            'field_group_id' => $aboutUsGroup->id,
            'label' => 'About Us Title',
            'name' => 'about_us_title',
            'type' => 'text',
            'instructions' => 'Title for the about us section',
            'required' => true,
            'default_value' => 'Über Niedrigzins24',
            'order' => 1,
        ]);

        Field::create([
            'field_group_id' => $aboutUsGroup->id,
            'label' => 'About Us Content',
            'name' => 'about_us_content',
            'type' => 'editor',
            'instructions' => 'Main content for about us section',
            'required' => false,
            'order' => 2,
        ]);

        Field::create([
            'field_group_id' => $aboutUsGroup->id,
            'label' => 'About Us Image',
            'name' => 'about_us_image',
            'type' => 'image',
            'instructions' => 'Image for about us section',
            'required' => false,
            'order' => 3,
        ]);

        // FAQ Section
        $faqGroup = FieldGroup::create([
            'title' => 'FAQ Section',
            'key' => 'faq_section',
            'location' => 'home',
            'order' => 5,
            'active' => true,
        ]);

        Field::create([
            'field_group_id' => $faqGroup->id,
            'label' => 'FAQ Title',
            'name' => 'faq_title',
            'type' => 'text',
            'instructions' => 'Title for FAQ section',
            'required' => false,
            'default_value' => 'FAQ',
            'order' => 1,
        ]);

        $faqRepeater = Field::create([
            'field_group_id' => $faqGroup->id,
            'label' => 'FAQ Items',
            'name' => 'faq_items',
            'type' => 'repeater',
            'instructions' => 'Add FAQ questions and answers',
            'required' => false,
            'order' => 2,
        ]);

        Field::create([
            'field_group_id' => $faqGroup->id,
            'parent_field_id' => $faqRepeater->id,
            'label' => 'Question',
            'name' => 'faq_question',
            'type' => 'text',
            'required' => true,
            'order' => 1,
        ]);

        Field::create([
            'field_group_id' => $faqGroup->id,
            'parent_field_id' => $faqRepeater->id,
            'label' => 'Answer',
            'name' => 'faq_answer',
            'type' => 'editor',
            'required' => true,
            'order' => 2,
        ]);
    }
}
