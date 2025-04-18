<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('packages')->delete();

        DB::table('packages')->insert(
            [
                [
                    'id' => 1,
                    'user_id' => NULL,
                    'name' => 'Free',
                    'sort' => 1,
                    'image' => NULL,
                    'resume_templates' => 0,
                    'cover_templates' => 0,
                    'description' => '<ul><li>Unlimited PDF Downloads</li><li>Spell &amp; Grammar Checker (5 Tries)</li><li>Unlimited Editing and Sharing</li><li>5 Resume &amp; Cover Letter Templates</li><li>Resume &amp; Cover Letter Examples</li><li>5 Resume Parser Tries</li><li>Basic Resume Sections</li><li>Basic AI Chat Support</li><li>3 Fonts &amp; 3 Color Themes</li><li>Database-Sourced Suggestions</li><li>Share/Download with AI Pro Resume Branding</li><li>Manual Cover Letter Generation</li></ul>',
                    'price' => '0.00',
                    'duration' => 30,
                    'coins' => 0,
                    'spell_and_grammar_tries' => 8,
                    'resume_parser_tries' => 10,
                    'max_services' => 10,
                    'ai_based_cover_letter_tries' => 0,
                    'display' => 1,
                    'status' => 'active',
                    'created_by' => NULL,
                    'updated_by' => NULL,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 2,
                    'user_id' => NULL,
                    'name' => 'Most Popular',
                    'sort' => 2,
                    'image' => NULL,
                    'resume_templates' => 2,
                    'cover_templates' => 2,
                    'description' => '<ul><li>Spell &amp; Grammar Checker (20 Tries)</li><li>6 Fonts &amp; Color Themes</li><li>Advanced AI-Based Chat Support</li><li>2 Premium Resume Templates</li><li>2 Premium Cover Letter Templates</li><li>1 Premium Service with 2 Revisions</li><li>10 Resume Parser Tries</li><li>Custom Resume Section</li><li>AI-Based Cover Letter Generation (5 tries)</li><li>Duplicate Resume Option</li><li>Share with AI Pro Resume Branding</li><li>Unlimited downloads Without AI Pro Resume Branding</li></ul>',
                    'price' => '15.59',
                    'duration' => 30,
                    'coins' => NULL,
                    'spell_and_grammar_tries' => 5,
                    'resume_parser_tries' => 5,
                    'max_services' => 5,
                    'ai_based_cover_letter_tries' => 5,
                    'display' => 1,
                    'status' => 'active',
                    'created_by' => NULL,
                    'updated_by' => NULL,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 3,
                    'user_id' => NULL,
                    'name' => 'Premium',
                    'sort' => 3,
                    'image' => NULL,
                    'resume_templates' => 5,
                    'cover_templates' => 5,
                    'description' => '<ul><li>5 Premium Resume &amp; Cover Letter Templates</li><li>Unlimited Resume &amp; Cover Letter Examples</li><li>Spell &amp; Grammar Checker (50 tries)</li><li>Unlimited PDF Downloads</li><li>Premium Support + AI-Based Chat Support</li><li>Access to Global Job Opportunities</li><li>AI-Based Cover Letter Generator (20 Tries)</li><li>Real-Time AI-Based Suggestions</li><li>2 Premium Services with 2 Revisions Each</li><li>20 Resume Parser Tries</li><li>Unlimited Fonts &amp; Themes</li><li>One-Time Payment (No Need to Cancel)</li><li>Share/Download Without AI Pro Resume Branding</li></ul>',
                    'price' => '29.99',
                    'duration' => 180,
                    'coins' => NULL,
                    'spell_and_grammar_tries' => 20,
                    'resume_parser_tries' => 20,
                    'max_services' => 20,
                    'ai_based_cover_letter_tries' => 20,
                    'display' => 1,
                    'status' => 'active',
                    'created_by' => NULL,
                    'updated_by' => NULL,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ]
            ]
        );
    }
}
