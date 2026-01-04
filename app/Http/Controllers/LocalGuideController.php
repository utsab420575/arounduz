<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalGuideController extends Controller
{
    /**
     * Display guide details
     */

    public function index(Request $request)
    {
        // Demo data - replace with actual database query
        $guidesData = $this->getDemoGuides();
        
        // Apply filters
        $guides = collect($guidesData);
        
        // Search filter
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $guides = $guides->filter(function($guide) use ($search) {
                return str_contains(strtolower($guide['name']), $search) ||
                       str_contains(strtolower($guide['location']), $search) ||
                       str_contains(strtolower($guide['description']), $search);
            });
        }
        
        // Status filter
        if ($request->filled('status')) {
            $guides = $guides->whereIn('status', $request->status);
        }
        
        // Rating filter
        if ($request->filled('rating')) {
            $guides = $guides->where('rating', '>=', $request->rating);
        }
        
        // Price range filter
        if ($request->filled('price_min')) {
            $guides = $guides->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $guides = $guides->where('price', '<=', $request->price_max);
        }
        
        // Sorting
        switch ($request->sort) {
            case 'rating':
                $guides = $guides->sortByDesc('rating');
                break;
            case 'price_low':
                $guides = $guides->sortBy('price');
                break;
            case 'price_high':
                $guides = $guides->sortByDesc('price');
                break;
            case 'experience':
                $guides = $guides->sortByDesc('experience');
                break;
            default:
                $guides = $guides->sortByDesc('reviews');
        }
        
        // Paginate
        $perPage = 12;
        $currentPage = $request->get('page', 1);
        $guides = new \Illuminate\Pagination\LengthAwarePaginator(
            $guides->forPage($currentPage, $perPage),
            $guides->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        
        return view('local-guide.list', compact('guides'));
    }

    public function show($id)
    {
        // In production, fetch from database
        // $guide = Guide::with(['reviews', 'services', 'availability'])->findOrFail($id);
        
        // Demo data
        $guide = $this->getDemoGuide($id);
        
        return view('local-guide.index', compact('guide'));
    }
    
    /**
     * Handle booking request
     */
    public function book(Request $request, $id)
    {
        $validated = $request->validate([
            'tour_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|string',
            'duration' => 'required|string',
            'num_people' => 'required|integer|min:1|max:20',
            'service_type' => 'required|string',
            'special_requests' => 'nullable|string|max:1000',
        ]);
        
        // Process booking
        // GuideBooking::create([...]);
        
        return response()->json([
            'success' => true,
            'message' => 'Booking request submitted successfully',
            'booking_id' => rand(1000, 9999) // Demo booking ID
        ]);
    }
    
    /**
     * Send message to guide
     */
    public function sendMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);
        
        // Send message/email
        // Mail::to($guide->email)->send(new ContactMessage($validated));
        
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully'
        ]);
    }
    
    /**
     * Add review
     */
    public function addReview(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'tour' => 'required|string',
            'review' => 'required|string|max:1000',
        ]);
        
        // Save review
        // GuideReview::create([...]);
        
        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully'
        ]);
    }
    
    /**
     * Toggle favorite
     */
    public function toggleFavorite($id)
    {
        // Toggle favorite in database
        // auth()->user()->guideFavorites()->toggle($id);
        
        return response()->json([
            'success' => true,
            'favorited' => true // or false
        ]);
    }
    
    /**
     * Get demo guide data
     */

    private function getDemoGuides()
    {
        return [
            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Akmal Karimov',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'reviews' => 127,
                'price' => 25000,
                'experience' => 12,
                'languages' => 4,
                'status' => 'online',
                'description' => 'Expert guide specializing in Silk Road history and architecture',
                'tags' => ['Historical', 'Photography', 'Cultural'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff',
                'favorite' => false
            ],
            // Add more demo guides...
        ];
    }
    
    private function getDemoGuide($id)
    {
        return [
            'id' => $id,
            'name' => 'Akmal Karimov',
            'title' => 'Expert Silk Road Guide',
            'tagline' => 'Bringing History to Life',
            'location' => 'Samarkand, Uzbekistan',
            'address' => 'Registan Square Area, Samarkand',
            'rating' => 4.9,
            'reviews_count' => 127,
            'tours_completed' => 500,
            'experience_years' => 12,
            'languages' => ['English', 'Russian', 'Uzbek', 'Turkish'],
            'phone' => '+998 90 123 4567',
            'email' => 'akmal.karimov@gmail.com',
            'telegram' => '@akmal_guide',
            'whatsapp' => '+998901234567',
            'hourly_rate' => 25,
            'daily_rate' => 150,
            'description' => 'Passionate local guide with over 12 years of experience in sharing the rich history and culture of Samarkand and the Silk Road. Specialized in historical tours, photography tours, and cultural experiences. I love connecting travelers with authentic Uzbek traditions and hidden gems.',
            'specializations' => ['Historical Tours', 'Photography', 'Cultural Immersion', 'Architecture', 'Food Tours'],
            'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff&size=400',
            'cover_image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1200',
            'verified' => true,
            'available' => true,
            'license_number' => 'UZ-G-2012-5678',
            'certifications' => [
                'Licensed Tour Guide',
                'First Aid Certified',
                'Tourism Professional Certificate',
                'UNESCO Heritage Guide'
            ]
        ];
    }
}