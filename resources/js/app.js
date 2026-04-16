import './bootstrap';
import $ from 'jquery';
import JSZip from 'jszip';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
import Chart from 'chart.js/auto';
import { TreemapController, TreemapElement } from 'chartjs-chart-treemap';
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-buttons/js/buttons.colVis';
import 'datatables.net-bs5/css/dataTables.bootstrap5.css';
import 'datatables.net-buttons-bs5/css/buttons.bootstrap5.css';

window.$ = window.jQuery = $;
window.JSZip = JSZip;
pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.pdfMake = pdfMake;

Chart.register(TreemapController, TreemapElement);
window.Chart = Chart;
window.TreemapController = TreemapController;
window.TreemapElement = TreemapElement;
