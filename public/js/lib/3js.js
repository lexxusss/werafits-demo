var camera, scene, renderer, stats;
var geometry, group;
init();
animate();

function init() {
    var container = document.getElementById('content3d');
    camera = new THREE.PerspectiveCamera(75, 2, 2, 1000);
    camera.position.z = 500;
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff);
    scene.fog = new THREE.Fog(0xffffff, 1, 10000);
    var geometry = new THREE.BoxBufferGeometry(100, 100, 100);
    var material = new THREE.MeshNormalMaterial();
    group = new THREE.Group();
    for (var i = 0; i < 1000; i++) {
        var mesh = new THREE.Mesh(geometry, material);
        mesh.position.x = Math.random() * 2000 - 1000;
        mesh.position.y = Math.random() * 2000 - 1000;
        mesh.position.z = Math.random() * 2000 - 1000;
        mesh.rotation.x = Math.random() * 2 * Math.PI;
        mesh.rotation.y = Math.random() * 2 * Math.PI;
        mesh.matrixAutoUpdate = false;
        mesh.updateMatrix();
        group.add(mesh);
    }
    scene.add(group);
    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);
}

//
function animate() {
    requestAnimationFrame(animate);
    render();
}

function render() {
    var time = Date.now() * 0.001;
    var rx = Math.sin(time * 0.7) * 0.5,
        ry = Math.sin(time * 0.3) * 0.5,
        rz = Math.sin(time * 0.2) * 0.5;
    camera.position.x += (camera.position.x) * 0.05;
    camera.position.y += (camera.position.y) * 0.05;
    camera.lookAt(scene.position);
    group.rotation.x = rx;
    group.rotation.y = ry;
    group.rotation.z = rz;
    renderer.render(scene, camera);
}