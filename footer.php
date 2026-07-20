<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra Child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php
	astra_content_after();

	astra_footer_before();
?>

	<!-- Pre-Footer Contact and Showroom Section -->
	<div class="bollu-pre-footer">
		<div class="pre-footer-container">
			<div class="pre-footer-col">
				<h3>التواصل مع Kezan Elite</h3>
				<p class="description">للاستفسار عن القطع الفنية، التشكيلات، والمشاريع الخاصة.</p>
				<p class="contact-info">
					<a href="tel:+9647709588489">+964 770 958 8489</a>
					<span class="sep">|</span>
					<a href="mailto:info@kezanelite.com">info@kezanelite.com</a>
				</p>
			</div>
			<div class="pre-footer-col">
				<h3>صالة العرض</h3>
				<p class="description">بغداد - الكرادة</p>
				<p class="hours">الإثنين – الجمعة · 10:00 – 17:00 (بتوقيت بغداد)</p>
			</div>
		</div>
	</div>

	<!-- Custom Luxury Footer (Bollu.ru Style) -->
	<footer class="custom-bollu-footer">
		<div class="footer-top-row">
			<div class="footer-top-container">
				<div class="footer-brand-column">
					<ul class="footer-links-list">
						<li><a href="#"><?php esc_html_e('الدار', 'astra'); ?></a></li>
						<li><a href="#"><?php esc_html_e('المدونة', 'astra'); ?></a></li>
						<li><a href="#"><?php esc_html_e('اتصل بنا', 'astra'); ?></a></li>
					</ul>
					
					<h2 class="footer-large-headline"><?php esc_html_e('الأثاث كحضور.', 'astra'); ?></h2>
					
					<div class="footer-contact-details">
						<a href="tel:+9647709588489" class="footer-contact-link">+964 770 958 8489</a>
						<a href="mailto:info@kezanelite.com" class="footer-contact-link">info@kezanelite.com</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Certificate of Origin Section inside Footer -->
		<div class="footer-cert-row">
			<div class="bollu-cert-container">
				<div class="bollu-cert-logo-section">
					<div class="bollu-cert-shield-gold">
						<span class="gold-b">K</span>
					</div>
					<div class="bollu-cert-text-block">
						<span class="cert-subtitle">CERTIFICATE OF ORIGIN</span>
						<h3 class="cert-title">The Original by Kezan Elite</h3>
						<span class="cert-tagline">FURNITURE AS ART</span>
					</div>
				</div>
				<div class="bollu-cert-features-section">
					<div class="cert-feature-col">
						<div class="cert-feature-icon-wrap">
							<span class="gold-check">✓</span>
						</div>
						<div class="cert-feature-text">
							<h4>OFFICIAL COLLECTION</h4>
							<p>التشكيلات الأصلية تُعرض فقط وحصرياً على موقعنا الرسمي.</p>
						</div>
					</div>
					<div class="cert-feature-col">
						<div class="cert-feature-icon-wrap">
							<span class="gold-check">✓</span>
						</div>
						<div class="cert-feature-text">
							<h4>DIRECT FROM THE MAISON</h4>
							<p>نحن لا نتعامل مع الوسطاء أو المنصات الخارجية لضمان الجودة.</p>
						</div>
					</div>
					<div class="cert-feature-col">
						<div class="cert-feature-icon-wrap">
							<span class="gold-check">✓</span>
						</div>
						<div class="cert-feature-text">
							<h4>HAND-PAINTED ORIGINALS</h4>
							<p>يتم توثيق أصالة الخامات والتفاصيل الفنية من خلال موقعنا.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom-row">
			<div class="footer-bottom-container">
				<div class="footer-copyright-block">
					<p class="footer-copyright-text">© 2019—2026 KEZAN ELITE FURNITURE AS ART</p>
					<p class="footer-disclaimer-text">المعلومات الواردة على الموقع هي لأغراض مرجعية فقط ولا تشكل عرضاً عاماً.</p>
					<a href="#" class="footer-privacy-link">سياسة الخصوصية</a>
				</div>
			</div>
		</div>
	</footer>

<?php
	astra_footer_after();
?>
	</div><!-- #page -->
<?php
	astra_body_bottom();
	wp_footer();
?>
	</body>
</html>
