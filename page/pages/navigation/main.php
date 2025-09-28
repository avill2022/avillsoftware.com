<?php
include_once("../../common/constants.php");
/*session_start();
if (!isset($_SESSION["user_id"]) && !isset($_SESSION["email"]))
	header('Location: ../index.php');*/
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<link rel="icon" type="image/svg+xml" href="/vite.svg" />
	<meta name="generator" content="Hostinger Horizons" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<meta name="description"
		content="Avill - Desarrollo de software para medianas empresas. Asesorías, contratación de programadores y cursos de programación e IA." />
	<title>Avill - Desarrollo de Software para Medianas Empresas</title>
	<!--<script type="module" crossorigin src="/assets/index-b13e7d76.js">

		</script>-->
	<link rel="stylesheet" href=<?php echo $name . "assets/index-aee3f9dd.css"; ?>>
	<script type="module">
		window.onerror = (message, source, lineno, colno, errorObj) => {
			const errorDetails = errorObj ? JSON.stringify({
				name: errorObj.name,
				message: errorObj.message,
				stack: errorObj.stack,
				source,
				lineno,
				colno,
			}) : null;

			window.parent.postMessage({
				type: 'horizons-runtime-error',
				message,
				error: errorDetails
			}, '*');
		};
	</script>
	<script type="module">
		const observer = new MutationObserver((mutations) => {
			for (const mutation of mutations) {
				for (const addedNode of mutation.addedNodes) {
					if (
						addedNode.nodeType === Node.ELEMENT_NODE &&
						(
							addedNode.tagName?.toLowerCase() === 'vite-error-overlay' ||
							addedNode.classList?.contains('backdrop')
						)
					) {
						handleViteOverlay(addedNode);
					}
				}
			}
		});

		observer.observe(document.documentElement, {
			childList: true,
			subtree: true
		});

		function handleViteOverlay(node) {
			if (!node.shadowRoot) {
				return;
			}

			const backdrop = node.shadowRoot.querySelector('.backdrop');

			if (backdrop) {
				const overlayHtml = backdrop.outerHTML;
				const parser = new DOMParser();
				const doc = parser.parseFromString(overlayHtml, 'text/html');
				const messageBodyElement = doc.querySelector('.message-body');
				const fileElement = doc.querySelector('.file');
				const messageText = messageBodyElement ? messageBodyElement.textContent.trim() : '';
				const fileText = fileElement ? fileElement.textContent.trim() : '';
				const error = messageText + (fileText ? ' File:' + fileText : '');

				window.parent.postMessage({
					type: 'horizons-vite-error',
					error,
				}, '*');
			}
		}
	</script>
	<script type="module">
		const originalConsoleError = console.error;
		console.error = function (...args) {
			originalConsoleError.apply(console, args);

			let errorString = '';

			for (let i = 0; i < args.length; i++) {
				const arg = args[i];
				if (arg instanceof Error) {
					errorString = arg.stack || `${arg.name}: ${arg.message}`;
					break;
				}
			}

			if (!errorString) {
				errorString = args.map(arg => typeof arg === 'object' ? JSON.stringify(arg) : String(arg)).join(' ');
			}

			window.parent.postMessage({
				type: 'horizons-console-error',
				error: errorString
			}, '*');
		};
	</script>
	<script type="module">
		const originalFetch = window.fetch;

		window.fetch = function (...args) {
			const url = args[0] instanceof Request ? args[0].url : args[0];

			// Skip WebSocket URLs
			if (url.startsWith('ws:') || url.startsWith('wss:')) {
				return originalFetch.apply(this, args);
			}

			return originalFetch.apply(this, args)
				.then(async response => {
					const contentType = response.headers.get('Content-Type') || '';

					// Exclude HTML document responses
					const isDocumentResponse =
						contentType.includes('text/html') ||
						contentType.includes('application/xhtml+xml');

					if (!response.ok && !isDocumentResponse) {
						const responseClone = response.clone();
						const errorFromRes = await responseClone.text();
						const requestUrl = response.url;
						console.error(`Fetch error from ${requestUrl}: ${errorFromRes}`);
					}

					return response;
				})
				.catch(error => {
					if (!url.match(/.html?$/i)) {
						console.error(error);
					}

					throw error;
				});
		};
	</script>
</head>

<body>
	<div id="root">
		<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white">

			<?php include_once("../../common/header.php"); ?>
			<?php include_once("../../modals/proyecto_formulario.php"); ?>

			<main id="main" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
				<div id="loading" class="loader-container">
					<div class="loader"></div>
				</div>
				<div id="content1"></div>
				<div id="content">
					<?php include_once("main_content.php"); ?>

					<?php //include_once("navigation/software-develop.php"); ?>
					<?php //include_once("navigation/contratacion-talento.php"); ?>
					<?php //include_once("navigation/capacitacion-ia.php"); ?>
					<?php //include_once("navigation/asesorias-tecnicas.php"); ?>
				</div>
			</main>


			<?php include_once("../../common/footer.php"); ?>
			<div role="region" aria-label="Notifications (F8)" tabindex="-1" style="pointer-events: none;">
				<ol tabindex="-1"
					class="fixed top-0 z-[100] flex max-h-screen w-full flex-col-reverse p-4 sm:bottom-0 sm:right-0 sm:top-auto sm:flex-col md:max-w-[420px]">
				</ol>
			</div>
		</div>
	</div>



	<veepn-lock-screen>
		<style>
			@font-face {
				font-family: FigtreeVF;
				src: url(chrome-extension://majdfhpaihoncoakbjgbdhglocklcgno/fonts/FigtreeVF.woff2) format("woff2 supports variations"), url(chrome-extension://majdfhpaihoncoakbjgbdhglocklcgno/fonts/FigtreeVF.woff2) format("woff2-variations");
				font-weight: 100 1000;
				font-display: swap
			}
		</style>
	</veepn-lock-screen>
	<veepn-guard-alert>
		<style>
			@font-face {
				font-family: FigtreeVF;
				src: url(chrome-extension://majdfhpaihoncoakbjgbdhglocklcgno/fonts/FigtreeVF.woff2) format("woff2 supports variations"), url(chrome-extension://majdfhpaihoncoakbjgbdhglocklcgno/fonts/FigtreeVF.woff2) format("woff2-variations");
				font-weight: 100 1000;
				font-display: swap
			}
		</style>
	</veepn-guard-alert>

	<script src=<?php echo $name . "page/pages/navigation/main.js"; ?>></script>
	<?php include_once("../../modals/proyecto_formulario.php"); ?>
	<?php include_once("../../modals/basic_message.php"); ?>

</body>

</html>