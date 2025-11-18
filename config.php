<?php
require __DIR__ . '/vendor/autoload.php';

use Supabase\SupabaseClient;

$SUPABASE_URL = "https://exfwcxzckfplubnsnolr.supabase.co";   // Ton URL Supabase
$SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImV4ZndjeHpja2ZwbHVibnNub2xyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MzQxNjUwMCwiZXhwIjoyMDc4OTkyNTAwfQ.APt2jv6YO4eIqchz5ISyGBHZSNyTWViFxvsX2AsAIds";           // Pas l'anon key !!

$supabase = new SupabaseClient($SUPABASE_URL, $SUPABASE_KEY);
