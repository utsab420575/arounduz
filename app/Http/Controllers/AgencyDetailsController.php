<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyDetailsController extends Controller
{
    /**
     * Display agency details
     */

    public function index(Request $request)
    {
        // Demo data - replace with actual database query
        $agentsData = $this->getDemoAgents();
        
        // Apply filters
        $agents = collect($agentsData);
        
        // Search filter
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $agents = $agents->filter(function($agent) use ($search) {
                return str_contains(strtolower($agent['name']), $search) ||
                       str_contains(strtolower($agent['location']), $search);
            });
        }
        
        // Status filter
        if ($request->filled('status')) {
            $agents = $agents->whereIn('status', $request->status);
        }
        
        // Rating filter
        if ($request->filled('rating')) {
            $agents = $agents->where('rating', '>=', $request->rating);
        }
        
        // Verified filter
        if ($request->boolean('verified')) {
            $agents = $agents->where('verified', true);
        }
        
        // Sorting
        switch ($request->sort) {
            case 'rating':
                $agents = $agents->sortByDesc('rating');
                break;
            case 'tours':
                $agents = $agents->sortByDesc('total_tours');
                break;
            case 'newest':
                $agents = $agents->sortByDesc('id');
                break;
            default:
                $agents = $agents->sortByDesc('reviews');
        }
        
        // Paginate
        $perPage = 12;
        $currentPage = $request->get('page', 1);
        $agents = new \Illuminate\Pagination\LengthAwarePaginator(
            $agents->forPage($currentPage, $perPage),
            $agents->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        
        return view('agency-details.list', compact('agents'));
    }

    public function show($id)
    {
        // In production, fetch from database
        // $agency = Agency::with(['tours', 'reviews', 'team'])->findOrFail($id);
        
        // Demo data
        $agency = $this->getDemoAgency($id);
        
        return view('agency-details.index', compact('agency'));
    }
    
    /**
     * Handle booking request
     */
    public function book(Request $request, $id)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'travelers' => 'required|integer|min:1',
            'tour_package' => 'required|string',
            'special_requests' => 'nullable|string|max:1000',
        ]);
        
        // Process booking
        // Booking::create([...]);
        
        return response()->json([
            'success' => true,
            'message' => 'Booking request submitted successfully',
            'booking_id' => rand(1000, 9999) // Demo booking ID
        ]);
    }
    
    /**
     * Send message to agency
     */
    public function sendMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);
        
        // Send message/email
        // Mail::to($agency->email)->send(new ContactMessage($validated));
        
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
        // Review::create([...]);
        
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
        // auth()->user()->favorites()->toggle($id);
        
        return response()->json([
            'success' => true,
            'favorited' => true // or false
        ]);
    }

    private function getDemoAgents()
    {
        return [
            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],

            [
                'id' => 1,
                'name' => 'Silk Road Adventures',
                'title' => 'Silk Road Adventures',
                'location' => 'Samarkand',
                'rating' => 4.9,
                'consultation_fee' => 234,
                'reviews' => 234,
                'total_tours' => 1500,
                'status' => 'available',
                'verified' => true,
                'description' => 'Premium travel agency specializing in cultural tours',
                'specialties' => [],
                'tags' => ['Cultural', 'Historical', 'Luxury'],
                'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                'avatar' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff',
                'favorite' => false
            ],
            // Add more demo agents...
        ];
    }
    
    /**
     * Get demo agency data
     */
    private function getDemoAgency($id)
    {
        return [
            'id' => $id,
            'name' => 'Silk Road Adventures',
            'tagline' => 'Your Gateway to Central Asia',
            'type' => 'Premium Travel Agency',
            'established' => '2015',
            'location' => 'Samarkand, Uzbekistan',
            'address' => '123 Registan Street, Samarkand 140100',
            'rating' => 4.9,
            'reviews_count' => 234,
            'tours_completed' => 1500,
            'languages' => ['English', 'Russian', 'Uzbek', 'German', 'French'],
            'phone' => '+998 90 123 4567',
            'email' => 'info@silkroadventures.uz',
            'website' => 'www.silkroadventures.uz',
            'telegram' => '@silkroad_tours',
            'whatsapp' => '+998901234567',
            'description' => 'Silk Road Adventures is a premier travel agency specializing in authentic cultural experiences across Uzbekistan and Central Asia. With over 8 years of experience, we offer carefully curated tours that showcase the rich history, stunning architecture, and warm hospitality of the Silk Road region.',
            'specializations' => ['Cultural Tours', 'Historical Sites', 'Adventure Travel', 'Luxury Packages', 'Group Tours'],
            'logo' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff&size=200',
            'cover_image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1200',
            'verified' => true,
            'license_number' => 'UZ-TL-2015-1234',
        ];
    }
}