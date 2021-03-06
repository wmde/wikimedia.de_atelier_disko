<?php

use base_core\base\Sites;
use textual\Modulation as Textual;

// The Sites class gives us access to Site objects, where each has a title and a FQDN.
// Each app can host multiple Sites if needed.
$site = Sites::current($this->_request);

// Usually we automatically add the application's name to the title so `$this->title('Lorem')`
// would result in `Lorem - App`. The home page is treated a little different, as to allowing
// claims and full control over the title. Thus `$this->title('App: Lorem')` will result in
// `App: Lorem`.
//
// @see app/views/layouts/default.html.php
// @see base_core\extensions\helper\Seo::title()
//
$this->title($site->title());

$text  = $t('Wikipedia ist eine der zehn beliebtesten Websites der Welt. Ihre
Inhalte und die aller anderen Wikimedia-Projekte werden von Freiwilligen
erstellt, verbessert und verbreitet. Wikimedia Deutschland unterstützt ihre
Arbeit vor allem an Wikipedia, Wikimedia Commons, Wikidata, aber auch den
kleineren Projekten.');
$this->seo->set('description', $text);

?>
<main id="main" class="home">
	<section class="illu-hero sc--lightgreen-gradient">
		<div class="illu-hero__green"></div>
		<div class="illu-hero__wrapper">
			<div class="illu-hero__inner limit--20 cp--h1 center-column">
				<div class="illu-hero__cube"></div>
			</div>
		</div>
		<div class="illu-hero__wrapper--no-overflow">
			<div class="illu-hero__blue"></div>
		</div>
		<div class="illu-hero__inner limit--20 cp--h1 center-column">
			<div class="illu-hero__text tl--alpha">
				<?php echo $blocks['vision']->value() ?>
			</div>
		</div>
		<div class="illu-hero__lower sc--white">
			<div class="illu-hero__inner limit--20 cp--h1 center-column">
				<?= $this->references->cite($references['hero'], [
					'style' => 'long',
					'class' => 'illu-hero__ref ts--beta'
				]) ?>
			</div>
		</div>
	</section>

	<section class="mission sc--white">
		<div class="mission__inner limit--16 cp--h1 cp--v2 center-column clearfix">
			<h1 class="mission__headline tl--beta t--strong">Mission</h1>
			<div class="mission__text tl--gamma cp--0-5">
				<?php echo $blocks['mission']->value() ?>
			</div>
			<figure class="fig mission__image cm--l2 cm--t1">
				<div>
				<?= $this->assets->image('/app/img/mission_abraham.png', [
					'class' => 'fig__media',
					'alt' => $t('Portrait von Abraham Taherivand')
				]) ?>
				<?= $this->references->cite($references['mission'], [
					'class' => 'fig__ref ts--beta',
					'style' => 'short'
				]) ?>
				</div>
				<figcaption class="fig__caption mission__caption cm--l0-25">
					<div class="tm--gamma t--caps">Abraham&nbsp;Taherivand</div>
					<div class="tm--gamma"><?php echo $t("Geschäftsführender&nbsp;Vorstand"); // echo does not print &nbsp; ?></div>
				<figcaption>
			</figure>
		</div>
	</section>
	<section class="fields is-active-support">
		<div class="sc--lightblue fields--grid">
			<div class="limit--16 center-column cp--h1 cp--t1-25">
				<h1 class="tl--beta t--strong"><?= $t("Handlungsfelder") ?></h1>
			</div>
			<div class="field-buttons limit--16 center-column cp--h0-5 cp--t0-5 cp--b1-75">
				<a
					href="#fields-support"
					class="field-button field-button--alpha corners corners--green cm--0-5 cp--0-5"
					aria-controls="fields-blurb"
					role="button"
				>
					<div class="field-button__inner tl--gamma">
						<?= $t("Freiwillige unterstützen, gewinnen und halten") ?>
					</div>
				</a>
				<a
					href="#fields-dev"
					class="field-button field-button--beta corners corners--green cm--0-5 cp--0-5"
					aria-controls="fields-blurb"
					role="button"
				>
					<div class="field-button__inner tl--gamma">
						<?= $t("Software entwickeln") ?>
					</div>
				</a>
				<a
					href="#fields-know"
					class="field-button field-button--gamma corners corners--green cm--0-5 cp--0-5"
					aria-controls="fields-blurb"
					role="button"
				>
					<div class="field-button__inner tl--gamma">
						<?php echo $t("Rahmen&shy;bedingungen für Freies Wissen stärken"); // echo does not print &shy; ?>
					</div>
				</a>
			</div>
		</div>
		<div class="sc--white">
			<div class="fields__blurb-wrapper limit--16 center-column cp--b1 cp--h1">
				<div id="fields-blurb" class="fields__blurb limit--8" aria-live="polite">
					<div class="fields__blurb-top"></div>
					<div class="fields__blurb-lower cp--0-5 tm--beta">
						<article id="fields-support" class="fields__text">
							<?php echo $blocks['fields.support']->value() ?>
						</article>
						<article id="fields-dev" class="fields__text" hidden>
							<?php echo $blocks['fields.dev']->value() ?>
						</article>
						<article id="fields-know" class="fields__text" hidden>
							<?php echo $blocks['fields.know']->value() ?>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="cta" class="cta-bar sc--lightorange">
		<div class="limit--16 center-column cp--v1 cp--h0-5 cta-buttons">
			<a
				href="https://spenden.wikimedia.de/apply-for-membership?piwik_campaign=wm.de_neu&piwik_kwd=mitglieds_btn"
				class="cta-button cp--0-5 cm--0-5 corners corners--orange"
			>
				<div class="cta-button__inner">
				<div class="tm--gamma t--caps t--strong"><?= $t("Werde Mitglied bei") ?></div>
				<div class="tm--delta"><?= $t("Wikimedia Deutschland") ?></div>
				</div>
			</a>
			<a
				href="https://spenden.wikimedia.de/?piwik_campaign=wm.de_neu&piwik_kwd=spenden_btn"
				class="cta-button cp--0-5 cm--0-5 corners corners--orange"
			>
				<div class="cta-button__inner">
					<div class="tm--gamma t--caps t--strong"><?= $t("Spende für") ?></div>
					<div class="tm--delta"><?= $t("Freies Wissen") ?></div>
				</div>
			</a>
		</div>
	</section>

	<section class="news sc--lightgray">
		<?php
			$linkTitle = function($item) use ($t) {
				$sourceMatch = [
					'#(^job\.wikimedia|/wiki/job)#' => $t('Zur Jobseite'),
					'#vimeo.com#' => $t('Zum Vimeo Channel')
				];
				foreach ($sourceMatch as $regex => $title) {
					if (preg_match($regex, $item->source)) {
						return $title;
					}
				}
				if ($item->hasTag('initiative')) {
					return $t('Zu dieser Initiative');
				}
				if ($item->hasTag('projekt')) {
					return $t('Zu diesem Projekt');
				}
				if ($item->hasTag('event')) {
					return $t('Zu diesem Event');
				}
				return $t('Zur Webseite');
			};
		?>
		<div class="news__inner limit--16 center-column cp--h1 cp--t2">
			<h1 class="tl--beta t--strong"><?= $t("Aktuelles") ?></h1>

			<?php $i = 0; foreach ($posts as $item): ?>
			<?php
				// Allows to set initial state of the slider, so we don't have to wait for
				// JavaScript to be loaded, to display the initial state.
				$isFirst = $i === 0;

				$classes = array_map(function($v) {
					return "tagged--{$v}";
				}, $item->tags(['serialized' => false]));

				$i++;
			?>
			<article
				<?php if ($isFirst): ?>
					id="news-stage"
					class="news__post cp--b2"
					aria-live="polite"
				<?php else: ?>
					class="news__post cp--b2" hidden
				<?php endif ?>
			>
				<div class="news__box <?php echo implode(' ', $classes) ?> limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white">
					<h1 class="news__title tm--gamma t--caps">
					<?php
						if ($item->hasTag('wikimedia')) {
							echo 'Wikimedia';
						} elseif ($item->hasTag('initiative'))  {
							echo $t('Initiative');
						} elseif ($item->hasTag('mitglieder'))  {
							echo $t('Mitglieder');
						} elseif ($item->hasTag('projekt'))  {
							echo $t('Projekt');
						} elseif ($item->hasTag('event'))  {
							echo $t('Event');
						} else {
							echo $item->title;
						}
					?>
					</h1>
					<div class="news__image<?php if ($isFirst): ?> active<?php endif ?>" >
						<?php if ($cover = $item->cover()): ?>
						<figure class="fig">
							<?= $this->media->image($cover->version('fix20'), [
								'class' => 'fig__media',
								'alt' => $cover->title
							]) ?>
							<?php if ($ref = $cover->reference()): ?>
								<?= $this->references->cite($ref, [
									'class' => 'fig__ref ts--beta',
									'style' => 'short'
								]) ?>
							<?php endif ?>
						</figure>
					<?php endif ?>
					</div>

					<div class="news__teaser tm--alpha">
						<?php echo Textual::limit($item->teaser, 140, ['html' => true]) ?>
					</div>
					<div class="news__text tm--beta cm--b1">
						<?php echo Textual::limit($item->body, 260, ['html' => true]) ?>
					</div>

					<?php if ($item->source): ?>
						<?= $this->html->link($linkTitle($item), $item->source, [
							'class' => 'news__link link--black ts--alpha',
							'target' => 'new'
						]) ?>
					<?php else: ?>
						<?= $this->html->link($linkTitle($item), '#', [
							'hidden' => '',
							'class' => 'news__link link--black ts--alpha',
							'target' => 'new'
						]) ?>
					<?php endif ?>
				</div>
			</article>
			<?php endforeach ?>
		</div>
	</section>

	<section class="team sc--white">
		<div class="team__inner limit--16 cp--h1 cp--t1-25 center-column">
			<h1 class="tl--beta t--strong"><?= $t("Unser Präsidium") ?></h1>

			<?php $i = 0; foreach ($teamMembers as $item): ?>
			<?php
				// Allows to set initial state of the slider, so we don't have to wait for
				// JavaScript to be loaded, to display the initial state.
				$isFirst = $i === 0;
				$i++;
			?>
			<article
				<?php if ($isFirst): ?>
					id="member-stage"
					role="region"
					aria-live="polite"
				<?php endif ?>
				class="member cp--b4 clearfix"
			>
				<h1 class="member__name" hidden><?= $item->name ?> </h1>
				<div class="member__image">
					<?php if ($cover = $item->cover()): ?>
						<figure class="fig member__fig">
							<?= $this->media->image($cover->version('fix20'), [
								'class' => 'fig__media',
								'alt' => $t('Portrait von {:name}', ['name' => $item->name])
							]) ?>
							<?php if ($ref = $cover->reference()): ?>
								<?= $this->references->cite($ref, [
									'class' => 'fig__ref ts--beta',
									'style' => 'short'
								]) ?>
							<?php endif ?>
						</figure>
					<?php endif ?>
				</div>
				<div class="member__info limit--5">
					<h2 class="member__role tm--alpha t--strong"><?= $item->position ?></h2>
					<div class="member__text tm--beta" ><?php echo $item->vita ?></div>

					<?php if ($item->email): ?>
					<a
						class="member__link ts--alpha"
						href="mailto:<?php echo $item->email ?>"
					>
						<span class="ts--beta"><?= $t('E-Mail:') ?></span>
						<span class="member__mail"><?= $item->email ?></span>
					</a>
					<?php elseif ($isFirst): ?>
					<a class="member__link ts--alpha" href="#" hidden>
						<span class="ts--beta"><?= $t('E-Mail:') ?></span>
						<span class="member__mail"></span>
					</a>
					<?php endif ?>
				</div>
			</article>
			<?php endforeach ?>
		</div>
	</section>
</main>