<?php
/**
 * Template Name: Bostel BMS Landing Page
 * Template Post Type: page
 *
 * Standalone paid-ad landing page (Facebook / Instagram traffic). Deliberately
 * bypasses get_header() / get_footer() so none of the Astra / bostel-theme
 * site chrome (theme nav, theme header, theme footer) renders - this page
 * ships its own complete <head>, header, footer, and styling, identical to
 * the standalone bostel-bms-landing-page.html build.
 *
 * wp_head() / wp_footer() are still called (not get_header()/get_footer())
 * so plugins that hook into those actions (analytics, SEO, security, admin
 * bar when logged in) keep working without pulling in theme markup.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<!--
  ============================================================================
  BOSTEL BMS - PAID AD LANDING PAGE (Facebook / Instagram traffic)
  ============================================================================
  Single conversion goal: 10-day free trial signup.
  No global site nav is included on purpose - this page is a dead end by
  design so ad traffic converts instead of wandering to the main site.

  BUILD NOTES / CONTRADICTION RESOLVED (read before editing):
  The brief's "TECHNICAL REQUIREMENTS" section asked for a placeholder
  contact form (name, email, phone) to live ONLY in the Final CTA section.
  The "PAGE STRUCTURE / FINAL CTA" section then explicitly says NOT to add
  a "leave your number" form there, and to keep exactly one conversion
  path (the self-serve trial button), repeated consistently. Those two
  instructions conflict for the same section. Per the FINAL CTA section's
  explicit, detailed instruction ("this is intentional, not an oversight"),
  this build ships with NO contact form anywhere on the page - only the
  repeated "Start your 10-day free trial" button plus a secondary WhatsApp
  text link. Flag this to whoever reviews the build in case a contact
  form was actually wanted somewhere else on the page.

  WORDPRESS TEMPLATE NOTES:
  This file is the WordPress page-template version of the standalone
  bostel-bms-landing-page.html build. Keep both in sync when editing either
  one. Assign this template to a Page via Page Attributes -> Template ->
  "Bostel BMS Landing Page".

  PLACEHOLDERS TO REPLACE BEFORE LAUNCH (search for "TODO"):
  - Plan "Get Started" buttons (Starter/Standard/Gold) -> DONE. Each now links
    directly to its real WooCommerce checkout URL (variation_id 3792/3793/3794
    on product 3320). The hero and Final CTA "Start your 10-day free trial"
    buttons also link directly to the Standard plan checkout (variation_id
    3793). The footer has no trial CTA button (only links and app badges),
    so the #trial-signup anchor id on the Final CTA section is now unused
    but left in place in case it's needed again.
  - Logo -> DONE. Hotlinked directly from
    https://www.bostel.com/wp-content/uploads/2024/05/logo11.png (per explicit
    request - not downloaded locally), used in header and footer directly
    against the navy background. Note: this asset is the icon mark only
    (no "BOSTEL" wordmark text) - swap for a text-inclusive logo if the icon
    alone reads as too subtle for brand recognition on paid ad traffic. Also
    note: hotlinking depends on bostel.com staying up and not blocking
    hotlinks - host the file locally before launch if that's a concern.
  - Hero image -> DONE. Hotlinked directly from
    https://www.bostel.com/wp-content/uploads/2026/09/florida-landscaper.webp
    (per explicit request - not downloaded locally). Same hotlinking caveat
    as the logo above applies.
  - Video poster image -> real photography / screenshots
  - Video embed -> real hosted video (YouTube/Vimeo/self-hosted)
    Note: the whole "OVERVIEW VIDEO" section is currently hidden with
    style="display:none;" until the real embed and poster are ready - remove
    that inline style to bring it back.
  - Testimonials -> real customer quotes
  - Phone / WhatsApp numbers, email, address -> DONE. WhatsApp number is
    +1 (321) 732-5338 (wa.me/13217325338) in the header and Final CTA links.
    Footer phone number is tel:+13217325338, (321) 732-5338. Address is
    Bostel Communications, Inc., 4767 New Broad St, Orlando, FL 32814.
    Email remains support@bostel.com.
  - App store badges -> DONE for links (Google Play, App Store, and the direct
    APK download all point to the real URLs). Still using text-based badge
    styling instead of the official Google Play / App Store badge assets -
    swap in the official badge images before launch if brand guidelines
    require them.
  - Pricing add-on numbers -> DONE. Matches the current price sheet: Storage
    500 GB/1 TB/2 TB at $25/$45/$80 per month, and CRM work groups 1/2/3
    additional groups at $9.95/$14.95/$19.95 per month.
  ============================================================================
-->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bostel BMS - CRM for Micro and Small Businesses | Start Your Free Trial</title>
<meta name="description" content="Bostel BMS brings customers, quotes, billing, and payments together in one place for Micro and Small companies. Bilingual, works on phone, tablet, or computer. Start your 10-day free trial.">
<!-- TODO: replace with real Open Graph image + production domain before running ads -->
<meta property="og:title" content="Bostel BMS - The System That Organizes Quotes, Payments, and Crews">
<meta property="og:description" content="Bilingual CRM built for Micro and Small businesses. Set up in minutes. Start your 10-day free trial.">
<meta property="og:type" content="website">
<meta name="robots" content="noindex">
<!-- noindex on purpose: this is a paid-traffic landing page, not meant to rank organically. Remove if that changes. -->

<?php
/*
 * wp_head() is called here, BEFORE our own <style> block, on purpose.
 * Astra's theme CSS and Elementor's global Kit CSS both define color rules
 * on bare heading selectors (h1-h4) and on a:hover with the same
 * specificity as several of our own selectors. CSS resolves same-
 * specificity ties by source order (last one wins) - so our styles must
 * load AFTER everything wp_head() enqueues, or theme/page-builder colors
 * silently win on headings and hovered buttons across this page.
 */
wp_head();
?>
<style>
  :root{
    --navy: #0A1F5C;
    --navy-light: #17368C;
    --navy-dark: #071740;
    --accent: #1E90FF;
    --accent-dark: #1470CC;
    --success: #1E8E3E;
    --text-dark: #16213E;
    --text-body: #3A4459;
    --text-muted: #6B7280;
    --bg-light: #F5F8FC;
    --border-light: #E3E9F2;
    --white: #FFFFFF;
    --radius: 10px;
    --max-width: 1180px;
    --shadow-card: 0 2px 10px rgba(10, 31, 92, 0.08);
    --shadow-card-hover: 0 8px 24px rgba(10, 31, 92, 0.14);
  }

  *, *::before, *::after{ box-sizing: border-box; }

  html{ scroll-behavior: smooth; }

  body{
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    color: var(--text-body);
    background: var(--white);
    line-height: 1.55;
    -webkit-font-smoothing: antialiased;
  }

  img{ max-width: 100%; display: block; }

  a{ color: var(--accent); }

  h1, h2, h3, h4{
    color: var(--text-dark);
    line-height: 1.2;
    margin: 0 0 16px;
  }

  .container{
    width: 100%;
    max-width: var(--max-width);
    margin: 0 auto;
    padding: 0 20px;
  }

  section{ padding: 64px 0; }

  /* Skip link for keyboard/screen reader users */
  .skip-link{
    position: absolute;
    left: -999px;
    top: auto;
    background: var(--accent);
    color: var(--white);
    padding: 10px 16px;
    z-index: 1000;
    border-radius: 0 0 6px 0;
  }
  .skip-link:focus{
    left: 0;
    top: 0;
  }

  /* ==================== BUTTONS ==================== */
  .btn{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 1rem;
    font-weight: 700;
    padding: 16px 32px;
    border-radius: 8px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    line-height: 1.2;
    transition: background-color 0.15s ease, transform 0.05s ease;
  }
  .btn:active{ transform: translateY(1px); }

  /* One primary CTA style, reused everywhere in the page */
  .btn-primary{
    background: var(--accent);
    color: var(--white);
    box-shadow: 0 4px 14px rgba(30, 144, 255, 0.35);
  }
  /* a.btn-primary (not just .btn-primary) so this outranks the theme's
     bare "a:hover{color:...}" rule, which otherwise wins on specificity
     and turns the button text navy on hover. */
  a.btn-primary:hover{ background: var(--accent-dark); color: var(--white); }

  .btn-block{ width: 100%; }

  /* ==================== HEADER ==================== */
  .site-header{
    position: sticky;
    top: 0;
    z-index: 100;
    background: var(--navy-light);
    border-bottom: 1px solid rgba(255,255,255,0.08);
  }
  .site-header .container{
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 92px;
  }
  .logo{
    display: inline-flex;
    align-items: center;
    text-decoration: none;
  }
  .logo img{
    display: block;
    height: 68px;
    width: auto;
  }

  .header-contact{
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--white);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    background: rgba(255,255,255,0.08);
    padding: 9px 16px;
    border-radius: 999px;
  }
  a.header-contact:hover{ background: rgba(255,255,255,0.16); color: var(--white); }
  .header-contact svg{ flex-shrink: 0; }
  .header-contact .contact-label{ display: none; }
  @media (min-width: 480px){
    .header-contact .contact-label{ display: inline; }
  }

  /* ==================== HERO ==================== */
  .hero{
    background: var(--bg-light);
    padding: 48px 0;
  }
  .hero-inner{
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;
    align-items: center;
  }
  @media (min-width: 900px){
    .hero-inner{
      grid-template-columns: 1.05fr 0.95fr;
      gap: 48px;
    }
  }
  .hero-copy h1{
    color: var(--text-dark);
    font-size: 1.9rem;
    margin-bottom: 18px;
  }
  @media (min-width: 640px){ .hero-copy h1{ font-size: 2.4rem; } }
  @media (min-width: 900px){ .hero-copy h1{ font-size: 2.7rem; } }

  .hero-copy .subhead{
    color: var(--text-body);
    font-size: 1.05rem;
    margin-bottom: 24px;
    max-width: 540px;
  }

  .trust-list{
    list-style: none;
    margin: 0 0 28px;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .trust-list li{
    display: flex;
    align-items: flex-start;
    gap: 10px;
    color: var(--text-dark);
    font-size: 0.95rem;
    font-weight: 600;
  }
  .trust-list .check{
    flex-shrink: 0;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--success);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-top: 1px;
  }

  .hero-media{
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
  }
  .hero-media img{
    width: 100%;
    height: 100%;
    aspect-ratio: 4 / 3;
    object-fit: cover;
    background: #C7D4E8;
  }

  /* ==================== SECTION HEADINGS ==================== */
  .section-head{
    text-align: center;
    max-width: 720px;
    margin: 0 auto 40px;
  }
  .section-head h2{ color: var(--text-dark); font-size: 1.7rem; }
  @media (min-width: 640px){ .section-head h2{ font-size: 2rem; } }
  .section-head p{ color: var(--text-muted); font-size: 1.05rem; }
  .eyebrow{
    display: inline-block;
    color: var(--accent);
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
  }

  /* ==================== PROBLEM / SOLUTION ==================== */
  .ps-section{ background: var(--white); }
  .ps-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
  }
  @media (min-width: 780px){
    .ps-grid{ grid-template-columns: repeat(3, 1fr); }
  }
  .ps-card{
    background: var(--bg-light);
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 28px 24px;
  }
  .ps-block{ margin-bottom: 16px; }
  .ps-block:last-child{ margin-bottom: 0; }
  .ps-tag{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.78rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 4px 10px;
    border-radius: 999px;
    margin-bottom: 8px;
  }
  .ps-tag.problem{ background: #FDEAEA; color: #B3261E; }
  .ps-tag.solution{ background: #E7F6EC; color: var(--success); }
  .ps-block p{ margin: 0; color: var(--text-body); font-size: 0.98rem; }

  /* ==================== FEATURES GRID ==================== */
  .features-section{ background: var(--bg-light); }
  .features-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
  }
  @media (min-width: 700px){
    .features-grid{ grid-template-columns: repeat(2, 1fr); }
  }
  @media (min-width: 1000px){
    .features-grid{ grid-template-columns: repeat(3, 1fr); }
  }
  .feature-card{
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 26px 22px;
    box-shadow: var(--shadow-card);
  }
  .feature-icon{
    width: 46px;
    height: 46px;
    border-radius: 10px;
    background: rgba(30, 144, 255, 0.1);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
  }
  .feature-card h3{ color: var(--text-dark); font-size: 1.1rem; margin-bottom: 8px; }
  .feature-card p{ margin: 0; font-size: 0.94rem; color: var(--text-muted); }

  /* ==================== VIDEO ==================== */
  .video-section{ background: var(--white); text-align: center; }
  .video-wrap{
    max-width: 780px;
    margin: 0 auto;
    position: relative;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-card-hover);
    background: var(--navy-dark);
  }
  .video-wrap img{
    width: 100%;
    aspect-ratio: 16 / 9;
    object-fit: cover;
    opacity: 0.85;
  }
  .video-play-btn{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: var(--accent);
    border: 4px solid rgba(255,255,255,0.85);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--white);
    box-shadow: 0 6px 20px rgba(0,0,0,0.35);
  }
  .video-play-btn:hover{ background: var(--accent-dark); }

  /* ==================== SOCIAL PROOF ==================== */
  .proof-section{ background: var(--white); border-top: 1px solid var(--border-light); }
  .proof-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 22px;
  }
  @media (min-width: 780px){
    .proof-grid{ grid-template-columns: repeat(3, 1fr); }
  }
  .testimonial-card{
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 26px 24px;
    box-shadow: var(--shadow-card);
    display: flex;
    flex-direction: column;
  }
  .testimonial-stars{ color: #F5A623; font-size: 0.95rem; margin-bottom: 12px; letter-spacing: 2px; }
  .testimonial-quote{
    font-size: 1rem;
    color: var(--text-dark);
    margin: 0 0 18px;
    flex-grow: 1;
  }
  .testimonial-author{ font-weight: 700; color: var(--text-dark); font-size: 0.95rem; }
  .testimonial-meta{ font-size: 0.85rem; color: var(--text-muted); }

  /* ==================== PRICING ==================== */
  .pricing-section{ background: var(--white); border-top: 1px solid var(--border-light); }
  .pricing-featured{
    max-width: 460px;
    margin: 0 auto;
    background: var(--navy);
    border-radius: 16px;
    padding: 36px 32px;
    color: var(--white);
    text-align: center;
    box-shadow: var(--shadow-card-hover);
  }
  .pricing-featured .plan-badges{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 16px;
  }
  .pricing-featured .plan-badge{
    display: inline-block;
    background: var(--accent);
    color: var(--white);
    font-size: 0.75rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 5px 12px;
    border-radius: 999px;
  }
  .pricing-featured .plan-badge.alt{ background: var(--success); }
  .pricing-featured h3{ color: var(--white); font-size: 1.4rem; margin-bottom: 6px; }
  .pricing-featured .price{
    font-size: 2.6rem;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 4px;
  }
  .pricing-featured .price span{ font-size: 1rem; font-weight: 500; color: #C6D4EE; }
  .pricing-featured .trial-note{
    display: inline-block;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.35);
    color: var(--white);
    font-weight: 700;
    font-size: 0.95rem;
    padding: 7px 18px;
    border-radius: 999px;
    margin-bottom: 24px;
  }
  .plan-specs{
    list-style: none;
    margin: 0 0 26px;
    padding: 0;
    text-align: left;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .plan-specs li{ display: flex; align-items: center; gap: 10px; font-size: 0.95rem; }
  .plan-specs .check{
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: var(--success);
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .pricing-toggle{
    text-align: center;
    margin: 28px auto 0;
    max-width: 900px;
  }
  .pricing-toggle > summary{
    list-style: none;
    cursor: pointer;
    color: var(--accent);
    font-weight: 700;
    font-size: 0.98rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 4px;
  }
  .pricing-toggle > summary::-webkit-details-marker{ display: none; }
  .pricing-toggle > summary .arrow{ transition: transform 0.15s ease; }
  .pricing-toggle[open] > summary .arrow{ transform: rotate(180deg); }

  .other-plans{
    margin-top: 28px;
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    text-align: left;
  }
  @media (min-width: 700px){
    .other-plans{ grid-template-columns: repeat(2, 1fr); }
  }
  .plan-card{
    border: 1px solid var(--border-light);
    border-radius: var(--radius);
    padding: 26px 24px;
    background: var(--bg-light);
  }
  .plan-card h4{ font-size: 1.15rem; margin-bottom: 4px; }
  .plan-card .price{ font-size: 1.6rem; font-weight: 800; color: var(--text-dark); margin-bottom: 4px; }
  .plan-card .price span{ font-size: 0.9rem; font-weight: 500; color: var(--text-muted); }
  .plan-card ul{ margin: 14px 0 20px; padding-left: 20px; color: var(--text-body); font-size: 0.92rem; }
  .plan-card .btn{ padding: 12px 24px; font-size: 0.92rem; }

  .addon-tables{ margin-top: 32px; }
  .addon-tables h4{ font-size: 1.05rem; margin-bottom: 12px; }
  table.addon-table{
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 28px;
    font-size: 0.92rem;
  }
  table.addon-table caption{ text-align: left; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 6px; }
  table.addon-table th, table.addon-table td{
    text-align: left;
    padding: 10px 12px;
    border-bottom: 1px solid var(--border-light);
  }
  table.addon-table th{ color: var(--text-dark); background: var(--bg-light); }

  /* ==================== FAQ ==================== */
  .faq-section{ background: var(--bg-light); }
  .faq-list{ max-width: 780px; margin: 0 auto; }
  .faq-item{
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 8px;
    margin-bottom: 12px;
    overflow: hidden;
  }
  .faq-item summary{
    list-style: none;
    cursor: pointer;
    padding: 18px 20px;
    font-weight: 700;
    color: var(--text-dark);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }
  .faq-item summary::-webkit-details-marker{ display: none; }
  .faq-item summary .arrow{ flex-shrink: 0; transition: transform 0.15s ease; color: var(--accent); }
  .faq-item[open] summary .arrow{ transform: rotate(180deg); }
  .faq-item .faq-answer{ padding: 0 20px 20px; color: var(--text-body); font-size: 0.96rem; }
  .faq-answer .placeholder-note{
    display: block;
    margin-top: 8px;
    font-size: 0.8rem;
    color: var(--text-muted);
    font-style: italic;
  }

  /* ==================== FINAL CTA ==================== */
  .final-cta{
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-dark) 100%);
    color: var(--white);
    text-align: center;
  }
  .final-cta h2{ color: var(--white); font-size: 1.8rem; }
  @media (min-width: 640px){ .final-cta h2{ font-size: 2.2rem; } }
  .final-cta p.lead{ color: #D7E2F7; max-width: 560px; margin: 0 auto 32px; font-size: 1.05rem; }
  .final-cta .btn-primary{ font-size: 1.1rem; padding: 18px 40px; }
  .final-cta .secondary-link{
    display: block;
    margin-top: 20px;
    color: #C6D4EE;
    font-size: 0.92rem;
    text-decoration: underline;
  }
  .final-cta .secondary-link:hover{ color: var(--white); }

  /* ==================== FOOTER ==================== */
  .site-footer{
    background: var(--navy-light);
    color: #B9C6E3;
    padding: 56px 0 24px;
    font-size: 0.92rem;
  }
  .footer-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 36px;
    margin-bottom: 40px;
  }
  @media (min-width: 700px){
    .footer-grid{ grid-template-columns: 1.3fr 1fr 1fr 1fr; }
  }
  .footer-logo{
    display: inline-block;
    margin-bottom: 12px;
  }
  .footer-logo img{
    display: block;
    height: 64px;
    width: auto;
  }
  .footer-tagline{ color: #8FA0C4; max-width: 280px; }
  .footer-col h4{
    color: var(--white);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 16px;
  }
  .footer-col ul{ list-style: none; margin: 0; padding: 0; }
  .footer-col li{ margin-bottom: 10px; }
  .footer-col a{ color: #B9C6E3; text-decoration: none; }
  .footer-col a:hover{ color: var(--white); text-decoration: underline; }

  .app-badges{ display: flex; flex-direction: column; gap: 10px; margin-top: 4px; }
  .app-badge{
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 8px;
    padding: 9px 14px;
    color: var(--white);
    text-decoration: none;
    font-size: 0.85rem;
    line-height: 1.25;
  }
  a.app-badge:hover{ background: rgba(255,255,255,0.12); color: var(--white); }
  .app-badge .badge-eyebrow{ display: block; font-size: 0.65rem; color: #A9B7D6; }
  .app-badge .badge-name{ display: block; font-weight: 700; }

  .footer-bottom{
    border-top: 1px solid rgba(255,255,255,0.1);
    padding-top: 20px;
    text-align: center;
    color: #8FA0C4;
    font-size: 0.85rem;
  }

  /* Utility */
  .visually-hidden{
    position: absolute;
    width: 1px; height: 1px;
    padding: 0; margin: -1px;
    overflow: hidden;
    clip: rect(0,0,0,0);
    white-space: nowrap;
    border: 0;
  }
</style>
</head>
<body <?php body_class(); ?>>

<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- ==================== 1. HEADER ==================== -->
<header class="site-header">
  <div class="container">
    <a href="https://www.bostel.com" class="logo" aria-label="Bostel Communications website">
      <img src="https://www.bostel.com/wp-content/uploads/2024/05/logo11.png" alt="Bostel BMS">
    </a>
    <!-- WhatsApp / phone contact icon only - no nav links, no cart, no search on purpose -->
    <a href="https://wa.me/13217325338" class="header-contact" aria-label="Chat with us on WhatsApp">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4c-4.33 0-7.85 3.5-7.85 7.8 0 1.38.36 2.72 1.05 3.9L4 20l4.44-1.16a7.9 7.9 0 0 0 3.6.88h.01c4.33 0 7.85-3.5 7.85-7.8a7.7 7.7 0 0 0-2.3-5.6Zm-5.55 12a6.5 6.5 0 0 1-3.31-.9l-.24-.14-2.63.69.7-2.55-.15-.26a6.45 6.45 0 0 1-1-3.42c0-3.57 2.92-6.47 6.53-6.47a6.5 6.5 0 0 1 4.61 1.9 6.4 6.4 0 0 1 1.91 4.57c0 3.57-2.92 6.47-6.42 6.47Zm3.58-4.85c-.2-.1-1.17-.57-1.35-.64-.18-.07-.31-.1-.44.1-.13.19-.5.63-.62.77-.11.13-.23.15-.42.05-.2-.1-.83-.3-1.58-.96a5.9 5.9 0 0 1-1.09-1.34c-.11-.2 0-.3.09-.4.1-.1.2-.24.3-.36.1-.13.13-.2.2-.34.07-.14.03-.26-.02-.36-.05-.1-.44-1.05-.6-1.44-.16-.38-.32-.32-.44-.33h-.38c-.13 0-.34.05-.52.24-.18.19-.68.66-.68 1.6 0 .95.7 1.86.8 1.99.1.13 1.37 2.1 3.33 2.94.46.2.83.32 1.11.4.47.15.9.13 1.24.08.38-.06 1.17-.48 1.33-.94.16-.46.16-.85.11-.94-.05-.09-.18-.14-.38-.24Z" fill="currentColor"/>
      </svg>
      <span class="contact-label">WhatsApp Us</span>
    </a>
  </div>
</header>

<main id="main-content">

  <!-- ==================== 2. HERO ==================== -->
  <section class="hero">
    <div class="container hero-inner">
      <div class="hero-copy">
        <h1>The system that organizes quotes, payments, and crews for your Micro and Small business</h1>
        <p class="subhead">Bostel BMS brings customers, quotes, billing, and payments together in one place. Available on your phone, tablet, or computer.</p>

        <ul class="trust-list">
          <li>
            <span class="check" aria-hidden="true">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            Bilingual interface (English and Spanish)
          </li>
          <li>
            <span class="check" aria-hidden="true">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            Web, iPhone, and Android
          </li>
          <li>
            <span class="check" aria-hidden="true">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            Set up in minutes
          </li>
        </ul>

        <!-- Primary CTA - links directly to the Standard plan WooCommerce checkout. -->
        <a href="https://www.bostel.com/checkout/?add-to-cart=3320&variation_id=3793&quantity=1" class="btn btn-primary trial-cta" id="hero">Start your 10-day free trial</a>
      </div>

      <div class="hero-media">
        <img src="https://www.bostel.com/wp-content/uploads/2026/09/florida-landscaper.webp" alt="Florida Micro ans Small Businesses using Bostel BMS in the field">
      </div>
    </div>
  </section>

  <!-- ==================== 3. PROBLEM / SOLUTION ==================== -->
  <section class="ps-section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Sound familiar?</span>
        <h2>Stop losing jobs to paperwork</h2>
      </div>

      <div class="ps-grid">
        <div class="ps-card">
          <div class="ps-block">
            <span class="ps-tag problem">The problem</span>
            <p>Handwritten quotes that take days to reach the customer.</p>
          </div>
          <div class="ps-block">
            <span class="ps-tag solution">The Bostel BMS fix</span>
            <p>Send professional quotes by text message right from the job site.</p>
          </div>
        </div>

        <div class="ps-card">
          <div class="ps-block">
            <span class="ps-tag problem">The problem</span>
            <p>Without a shared calendar, two crews show up at the same job or an appointment gets missed.</p>
          </div>
          <div class="ps-block">
            <span class="ps-tag solution">The Bostel BMS fix</span>
            <p>Assign jobs, routes, and notes to each crew from one dashboard, visible to the whole team.</p>
          </div>
        </div>

        <div class="ps-card">
          <div class="ps-block">
            <span class="ps-tag problem">The problem</span>
            <p>Paper invoices mean weeks to get paid.</p>
          </div>
          <div class="ps-block">
            <span class="ps-tag solution">The Bostel BMS fix</span>
            <p>Accept payments instantly with PayPal, Stripe, or Square, right from the app.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 4. FEATURES GRID (2 rows x 3 cols) ==================== -->
  <section class="features-section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Everything in one place</span>
        <h2>Built for how Micro and Small businesses actually work</h2>
      </div>

      <div class="features-grid">

        <div class="feature-card">
          <div class="feature-icon" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7 4a4 4 0 0 0 4-4V9M20 5v.01" stroke="#1E90FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3>Customers and sales</h3>
          <p>Full CRM with opportunity tracking, cases organized by customer, and customer modeling and self-optimization.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 2h6l1 4H8l1-4ZM6 6h12l1 16H5L6 6Zm3 5h6M9 14h6" stroke="#1E90FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3>Quotes and invoicing</h3>
          <p>Sales module with custom forms, standard quotes and invoices, sent directly by email or SMS.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="#1E90FF" stroke-width="1.8"/><path d="M3 10h18M7 15h4" stroke="#1E90FF" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          <h3>Payments</h3>
          <p>Bostel POS for on-the-spot payments. Accept PayPal, Stripe, or Square, or take a credit card from anywhere.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="17" rx="2" stroke="#1E90FF" stroke-width="1.8"/><path d="M3 9h18M8 2v4M16 2v4" stroke="#1E90FF" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          <h3>Projects and tasks</h3>
          <p>Bostel Projects with dates and progress, a calendar for appointments/calls/meetings, and programmable reminders.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 7h3l2-3h6l2 3h3v13H4V7Z" stroke="#1E90FF" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="13" r="3.2" stroke="#1E90FF" stroke-width="1.8"/></svg>
          </div>
          <h3>Notes and photos</h3>
          <p>Photo or image notes, voice notes with a built-in editor, and quick access to customer and lead data.</p>
        </div>

        <div class="feature-card">
          <div class="feature-icon" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#1E90FF" stroke-width="1.8"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18" stroke="#1E90FF" stroke-width="1.8"/></svg>
          </div>
          <h3>Access from anywhere</h3>
          <p>Bilingual interface, works on web, iPhone, and Android, with multiple work groups per team.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ==================== 5. OVERVIEW VIDEO ==================== -->
  <!-- HIDDEN FOR NOW - remove style="display:none;" below to bring this section back -->
  <section class="video-section" style="display:none;">
    <div class="container">
      <div class="section-head">
        <h2>For more information on how Bostel BMS can help run and grow your business, watch our 1-minute overview video.</h2>
      </div>

      <!--
        TODO: replace with the real video embed, for example:
        <iframe src="https://www.youtube.com/embed/VIDEO_ID" title="Bostel BMS overview video"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        Design review note: the poster/thumbnail image below MUST show a real
        landscaping scene or an actual app screenshot - not generic
        car/house/briefcase style stock icons.
      -->
      <div class="video-wrap">
        <img src="assets/video-poster-landscaping-app.jpg" alt="Preview of the Bostel BMS overview video showing a Micro and Small crew using the app">
        <button type="button" class="video-play-btn" aria-label="Play the Bostel BMS overview video">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 5v14l11-7L8 5Z" fill="#fff"/></svg>
        </button>
      </div>
    </div>
  </section>

  <!-- ==================== 6. SOCIAL PROOF ==================== -->
  <!-- PLACEHOLDER TESTIMONIALS - REPLACE WITH REAL CUSTOMER QUOTES before launch -->
   <!-- 
  <section class="proof-section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Real results</span>
        <h2>Trusted by landscaping businesses across Florida</h2>
      </div>

      <div class="proof-grid">
        <div class="testimonial-card">
          <div class="testimonial-stars" aria-hidden="true">★★★★★</div>
          <p class="testimonial-quote">"This cut our quote turnaround from days to minutes."</p>
          <div class="testimonial-author">Miguel R.</div>
          <div class="testimonial-meta">Sunshine Lawn Care, Tampa, FL</div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-stars" aria-hidden="true">★★★★★</div>
          <p class="testimonial-quote">"Our crews finally know where they're supposed to be. No more double-booked jobs."</p>
          <div class="testimonial-author">Ana P.</div>
          <div class="testimonial-meta">Green Horizon Landscaping, Orlando, FL</div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-stars" aria-hidden="true">★★★★★</div>
          <p class="testimonial-quote">"We get paid on the spot now instead of chasing checks for weeks."</p>
          <div class="testimonial-author">Carlos D.</div>
          <div class="testimonial-meta">Palm Coast Turf & Design, Fort Myers, FL</div>
        </div>
      </div>
    </div>
  </section>
-->
  <!-- ==================== 7. PRICING ==================== -->
  <section class="pricing-section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Simple pricing</span>
        <h2>Start with the plan built for most Micro and Small Business teams</h2>
      </div>

      <div class="pricing-featured">
        <div class="plan-badges">
          <span class="plan-badge">Most popular</span>
          <span class="plan-badge alt">Try for free</span>
        </div>
        <h3>Bostel BMS CRM Standard</h3>
        <div class="price">$49.99<span>/mo</span></div>
        <p class="trial-note">10-day free trial included</p>

        <ul class="plan-specs">
          <li>
            <span class="check" aria-hidden="true"><svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            4 user seats
          </li>
          <li>
            <span class="check" aria-hidden="true"><svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            400 GB storage
          </li>
          <li>
            <span class="check" aria-hidden="true"><svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            Full CRM, quotes, invoicing, and payments
          </li>
        </ul>

        <a href="https://www.bostel.com/checkout/?add-to-cart=3320&variation_id=3793&quantity=1" class="btn btn-primary btn-block trial-cta" id="pricing-standard">Get Started</a>
      </div>

      <!-- Collapsed by default - native <details> for accessibility without extra JS -->
      <details class="pricing-toggle">
        <summary>
          See Starter and Gold plans and add-ons
          <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </summary>

        <div class="other-plans">
          <div class="plan-card">
            <h4>Bostel BMS CRM Starter</h4>
            <div class="price">$29.99<span>/mo</span></div>
            <ul>
              <li>2 user seats</li>
              <li>100 GB storage</li>
              <li>10-day free trial</li>
            </ul>
            <a href="https://www.bostel.com/checkout/?add-to-cart=3320&variation_id=3792&quantity=1" class="btn btn-primary trial-cta" id="pricing-starter">Get Started</a>
          </div>

          <div class="plan-card">
            <h4>Bostel BMS CRM Gold</h4>
            <div class="price">$119.99<span>/mo</span></div>
            <ul>
              <li>10 user seats</li>
              <li>1 TB storage</li>
              <li>10-day free trial</li>
            </ul>
            <a href="https://www.bostel.com/checkout/?add-to-cart=3320&variation_id=3794&quantity=1" class="btn btn-primary trial-cta" id="pricing-gold">Get Started</a>
          </div>
        </div>

        <div class="addon-tables">
          <h4>Storage add-ons</h4>
          <table class="addon-table">
            <thead>
              <tr><th scope="col">Add-on</th><th scope="col">Price</th></tr>
            </thead>
            <tbody>
              <tr><td>500 GB storage</td><td>$25.00/mo</td></tr>
              <tr><td>1 TB storage</td><td>$45.00/mo</td></tr>
              <tr><td>2 TB storage</td><td>$80.00/mo</td></tr>
            </tbody>
          </table>

          <h4>CRM work group add-ons</h4>
          <table class="addon-table">
            <thead>
              <tr><th scope="col">Add-on</th><th scope="col">Price</th></tr>
            </thead>
            <tbody>
              <tr><td>1 additional group</td><td>$9.95/mo</td></tr>
              <tr><td>2 additional groups</td><td>$14.95/mo</td></tr>
              <tr><td>3 additional groups</td><td>$19.95/mo</td></tr>
            </tbody>
          </table>
        </div>
      </details>
    </div>
  </section>

  <!-- ==================== 8. FAQ ==================== -->
  <section class="faq-section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Questions</span>
        <h2>Frequently asked questions</h2>
      </div>

      <div class="faq-list">
        <details class="faq-item">
          <summary>
            Do I need a credit card for the free trial?
            <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </summary>
          <div class="faq-answer">
            <p>Yes. A credit card or PayPal account is required to activate the 10-day trial. You won't be charged until the trial period ends.</p>
          </div>
        </details>

        <details class="faq-item">
          <summary>
            Can I change plans after signing up?
            <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </summary>
          <div class="faq-answer">
            <p>Yes, you can upgrade or downgrade between Starter, Standard, and Gold at any time from your account dashboard. Changes are prorated for the current billing cycle.</p>
          </div>
        </details>

        <details class="faq-item">
          <summary>
            Does the system work in Spanish?
            <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </summary>
          <div class="faq-answer">
            <p>Yes. Bostel BMS has a fully bilingual interface, and you can switch between English and Spanish at any time from your account settings.</p>
          </div>
        </details>

        <details class="faq-item">
          <summary>
            What devices can I use it on?
            <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </summary>
          <div class="faq-answer">
            <p>Bostel BMS works from any web browser on a computer or tablet, and has dedicated apps for iPhone and Android so your crews can use it in the field.</p>
          </div>
        </details>

        <details class="faq-item">
          <summary>
            What happens if I decide to cancel?
            <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </summary>
          <div class="faq-answer">
            <p>You can cancel at any time from your account dashboard with no long-term contract. Your data remains accessible for a limited period after cancellation so you can export it.</p>
          </div>
        </details>
      </div>
    </div>
  </section>

  <!-- ==================== 9. FINAL CTA ==================== -->
  <!--
    Single conversion path only, per explicit brief instruction: no second
    "leave your number" form here. See build note at top of file for the
    contradiction this resolves against the general contact-form requirement.
  -->
  <section class="final-cta" id="trial-signup">
    <div class="container">
      <h2>Start your 10-day free trial</h2>
      <p class="lead">Join Micro and Small businesses across Florida already running their quotes, payments, and crews from one place.</p>

      <a href="https://www.bostel.com/checkout/?add-to-cart=3320&variation_id=3793&quantity=1" class="btn btn-primary trial-cta" id="final">Start your 10-day free trial</a>

      <a href="https://wa.me/13217325338" class="secondary-link">Prefer to talk it through? WhatsApp us at (321) 732-5338</a>
    </div>
  </section>

</main>

<!-- ==================== 10. FOOTER ==================== -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-col">
        <a href="https://www.bostel.com" class="footer-logo" aria-label="Bostel Communications website"><img src="https://www.bostel.com/wp-content/uploads/2024/05/logo11.png" alt="Bostel BMS"></a>
        <p class="footer-tagline">Business management CRM built for Micro and Small companies. Bilingual. Web, iPhone, and Android.</p>
      </div>

      <div class="footer-col">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="https://www.bostel.com/bostel-bms-crm-plans/">Pricing</a></li>
          <li><a href="https://www.bostel.com/privacy-policy/">Privacy Policy</a></li>
          <li><a href="https://www.bostel.com/terms-and-conditions/">Terms of Service</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contact Us</h4>
        <ul>
          <li><a href="tel:+13217325338">(321) 732-5338</a></li>
          <li><a href="mailto:support@bostel.com">support@bostel.com</a></li>
          <li>Bostel Communications, Inc.<br>4767 New Broad St<br>Orlando, FL 32814</li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Download CRM App</h4>
        <div class="app-badges">
          <a href="https://play.google.com/store/apps/details?id=com.bostel.bostelcrm" class="app-badge" aria-label="Get Bostel BMS on Google Play" target="_blank" rel="noopener">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 3.5v17l14-8.5-14-8.5Z" fill="#fff"/></svg>
            <span><span class="badge-eyebrow">GET IT ON</span><span class="badge-name">Google Play</span></span>
          </a>
          <a href="https://apps.apple.com/bw/app/bostel-workgroup-crm/id1566632590" class="app-badge" aria-label="Download Bostel BMS on the App Store" target="_blank" rel="noopener">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M16.5 2c.15 1.1-.3 2.2-1 3-.7.8-1.9 1.5-3 1.4-.15-1.1.35-2.2 1-3 .75-.85 1.95-1.4 3-1.4ZM20 17.3c-.4.9-.85 1.8-1.5 2.6-.95 1.2-1.9 2.4-3.4 2.4-1.45 0-1.9-.85-3.6-.85-1.7 0-2.2.85-3.6.85-1.5 0-2.5-1.3-3.5-2.5-1.8-2.2-2.9-6.15-1.2-8.85.85-1.35 2.35-2.2 3.9-2.25 1.4-.05 2.75.95 3.6.95.85 0 2.5-1.15 4.15-.95.7.05 2.7.3 3.95 2.15-.1.05-2.35 1.4-2.3 4.05.03 3.15 2.75 4.2 2.5 4.35Z" fill="#fff"/></svg>
            <span><span class="badge-eyebrow">DOWNLOAD ON THE</span><span class="badge-name">App Store</span></span>
          </a>
          <a href="https://s3.us-east-1.amazonaws.com/bostel.com/bostel-bms-app.apk" class="app-badge" aria-label="Download the Bostel BMS Android APK directly">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v10m0 0-4-4m4 4 4-4M5 17v2a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-2" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span><span class="badge-eyebrow">DOWNLOAD APK</span><span class="badge-name">For Android</span></span>
          </a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      &copy; 2026 Bostel Communications Inc. All Rights Reserved.
    </div>
  </div>
</footer>

<script>
  // Minimal JS by design - this page is optimized for fast ad-traffic loads.
  // Adds a subtle shadow to the sticky header once the page has scrolled,
  // and wires the video placeholder button to a console note until a real
  // embed is added (TODO above).
  (function () {
    "use strict";

    var header = document.querySelector(".site-header");
    if (header) {
      var onScroll = function () {
        if (window.scrollY > 4) {
          header.style.boxShadow = "0 2px 12px rgba(0,0,0,0.18)";
        } else {
          header.style.boxShadow = "none";
        }
      };
      window.addEventListener("scroll", onScroll, { passive: true });
      onScroll();
    }

    var playBtn = document.querySelector(".video-play-btn");
    if (playBtn) {
      playBtn.addEventListener("click", function () {
        // TODO: swap this handler for real playback logic once the
        // real video embed (iframe or <video>) replaces the poster image.
        console.info("Bostel BMS: video placeholder clicked - wire up real embed here.");
      });
    }
  })();
</script>

<?php wp_footer(); ?>
</body>
</html>
