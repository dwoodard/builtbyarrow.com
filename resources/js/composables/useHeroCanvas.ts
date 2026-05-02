import { onMounted, onUnmounted, Ref } from 'vue';
import * as THREE from 'three';

export function useHeroCanvas(heroHeader: Ref<HTMLElement | null>, heroCanvas: Ref<HTMLCanvasElement | null>) {
  onMounted(() => {
    const canvas = heroCanvas.value;
    const header = heroHeader.value;

    if (!canvas || !header) return;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!reducedMotion) {
      const scene = new THREE.Scene();
      const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 100);
      camera.position.z = 7;

      const renderer = new THREE.WebGLRenderer({
        canvas,
        alpha: true,
        antialias: true,
        powerPreference: 'low-power',
      });

      renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.75));

      const isMobile = () => window.innerWidth < 768;
      const particleCount = isMobile() ? 52 : 90;
      const positions = new Float32Array(particleCount * 3);
      const basePositions = new Float32Array(particleCount * 3);

      for (let i = 0; i < particleCount; i++) {
        const i3 = i * 3;
        const x = (Math.random() - 0.5) * 9;
        const y = (Math.random() - 0.5) * 7;
        const z = (Math.random() - 0.5) * 2;

        positions[i3] = basePositions[i3] = x;
        positions[i3 + 1] = basePositions[i3 + 1] = y;
        positions[i3 + 2] = basePositions[i3 + 2] = z;
      }

      const geometry = new THREE.BufferGeometry();
      geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

      const material = new THREE.PointsMaterial({
        color: '#E6E3DC',
        size: 3,
        transparent: true,
        opacity: 1,
        depthWrite: false,
      });

      const particles = new THREE.Points(geometry, material);
      scene.add(particles);

      const lineGeometry = new THREE.BufferGeometry();
      const lineMaterial = new THREE.LineBasicMaterial({
        color: '#D8C9A8',
        transparent: true,
        opacity: 0.5,
        depthWrite: false,
      });

      const randomLine = () => [
        (Math.random() - 0.5) * 9,
        (Math.random() - 0.5) * 7,
        (Math.random() - 0.5) * 2,
      ];

      const linePositions = new Float32Array([
        ...randomLine(),
        ...randomLine(),
        ...randomLine(),
      ]);
      lineGeometry.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
      const lines = new THREE.LineSegments(lineGeometry, lineMaterial);
      scene.add(lines);

      let width = 0;
      let height = 0;
      let pointerX = 0;
      let pointerY = 0;
      let targetX = 0;
      let targetY = 0;

      const resize = () => {
        const rect = header.getBoundingClientRect();
        width = rect.width;
        height = rect.height;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height, false);
        material.size = isMobile() ? 0.025 : 0.032;
      };

      const onPointerMove = (event: PointerEvent) => {
        const rect = header.getBoundingClientRect();
        targetX = ((event.clientX - rect.left) / rect.width - 0.5) * 0.35;
        targetY = ((event.clientY - rect.top) / rect.height - 0.5) * 0.35;
      };

      window.addEventListener('resize', resize, { passive: true });
      window.addEventListener('pointermove', onPointerMove, { passive: true });
      resize();

      const clock = new THREE.Clock();

      const animate = () => {
        const elapsed = clock.getElapsedTime();

        pointerX += (targetX - pointerX) * 0.035;
        pointerY += (targetY - pointerY) * 0.035;

        for (let i = 0; i < particleCount; i++) {
          const i3 = i * 3;
          positions[i3] = basePositions[i3] + Math.sin(elapsed * 0.18 + i * 0.55) * 0.035;
          positions[i3 + 1] = basePositions[i3 + 1] + Math.cos(elapsed * 0.16 + i * 0.4) * 0.035;
        }

        geometry.attributes.position.needsUpdate = true;
        particles.rotation.y = elapsed * 0.018 + pointerX;
        particles.rotation.x = pointerY * 0.5;
        lines.rotation.y = elapsed * 0.012 + pointerX * 0.5;
        lines.rotation.x = pointerY * 0.25;

        renderer.render(scene, camera);
        requestAnimationFrame(animate);
      };

      animate();

      onUnmounted(() => {
        window.removeEventListener('resize', resize);
        window.removeEventListener('pointermove', onPointerMove);
      });
    } else if (canvas) {
      canvas.remove();
    }
  });
}
