<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($discussions as $discussion)
    <url>
      <?php
        $cek = DevDojo\Chatter\Models\Models::category()->find($discussion->chatter_category_id);
      ?>
      <loc>{{ url('/forums/discussion/'. $cek->slug .'/' . $discussion->slug) }}</loc>
      <lastmod>{{ $discussion->created_at->toAtomString() }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.6</priority>
    </url>
  @endforeach
</urlset>
