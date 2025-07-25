<?php

namespace App\Helpers;

class UrlHelper
{
    /**
     * Generate SEO-friendly restaurant URL
     *
     * @param string $id
     * @param string $restaurantSlug
     * @param string $zoneSlug
     * @return string
     */
    public static function generateRestaurantUrl($id, $restaurantSlug, $zoneSlug)
    {
        return route('restaurant.show', [$id, $restaurantSlug, $zoneSlug]);
    }
    
    /**
     * Convert string to URL-friendly slug
     *
     * @param string $text
     * @return string
     */
    public static function slugify($text)
    {
        // Convert to lowercase
        $text = strtolower($text);
        
        // Replace special characters with spaces
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        
        // Replace multiple spaces with single hyphen
        $text = preg_replace('/\s+/', '-', $text);
        
        // Replace multiple hyphens with single
        $text = preg_replace('/-+/', '-', $text);
        
        // Trim hyphens from start and end
        return trim($text, '-');
    }
} 