<?php
/* Copyright (c)
 * - 2006-2013, Konstantin Evdokimenko (qewerty@gmail.com), highlight.js
 *              (original author)
 * - 2006-2013, Shuen-Huei Guan (drake.guan@gmail.com), highlight.js
 * - 2013,      Geert Bergman (geert@scrivo.nl), highlight.php
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * 3. Neither the name of "highlight.js", "highlight.php", nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * This file is a direct port of rib.js, the Renderman Interface Bytestream
 * language definition file for highlight.js, to PHP.
 * @see https://github.com/isagalaev/highlight.js
 */
namespace Highlight\Languages;

use Highlight\Language;
use Highlight\Mode;

class RIB extends Language {
	
	protected function getName() {
		return "rib";
	}
	
	protected function getKeyWords() {
		return  
			"ArchiveRecord AreaLightSource Atmosphere Attribute AttributeBegin AttributeEnd Basis " .
			"Begin Blobby Bound Clipping ClippingPlane Color ColorSamples ConcatTransform Cone " .
			"CoordinateSystem CoordSysTransform CropWindow Curves Cylinder DepthOfField Detail " .
			"DetailRange Disk Displacement Display End ErrorHandler Exposure Exterior Format " .
			"FrameAspectRatio FrameBegin FrameEnd GeneralPolygon GeometricApproximation Geometry " .
			"Hider Hyperboloid Identity Illuminate Imager Interior LightSource " .
			"MakeCubeFaceEnvironment MakeLatLongEnvironment MakeShadow MakeTexture Matte " .
			"MotionBegin MotionEnd NuPatch ObjectBegin ObjectEnd ObjectInstance Opacity Option " .
			"Orientation Paraboloid Patch PatchMesh Perspective PixelFilter PixelSamples " .
			"PixelVariance Points PointsGeneralPolygons PointsPolygons Polygon Procedural Projection " .
			"Quantize ReadArchive RelativeDetail ReverseOrientation Rotate Scale ScreenWindow " .
			"ShadingInterpolation ShadingRate Shutter Sides Skew SolidBegin SolidEnd Sphere " .
			"SubdivisionMesh Surface TextureCoordinates Torus Transform TransformBegin TransformEnd " .
			"TransformPoints Translate TrimCurve WorldBegin WorldEnd";
	}
	
	protected function getIllegal() {
		return "<\/";
	}
	
	protected function getContainedModes() {
		
		return array(
			$this->HASH_COMMENT_MODE,
			$this->C_NUMBER_MODE,
			$this->APOS_STRING_MODE,
			$this->QUOTE_STRING_MODE
		);
		
	}

}

?>