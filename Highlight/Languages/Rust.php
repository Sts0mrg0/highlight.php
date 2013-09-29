<?php
/* Copyright (c)
 * - 2006-2013, Andrey Vlasovskikh (andrey.vlasovskikh@gmail.com), highlight.js
 *              (original author)
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
 * This file is a direct port of rust.js, the Rust language definition 
 * file for highlight.js, to PHP.
 * @see https://github.com/isagalaev/highlight.js
 */
namespace Highlight\Languages;

use Highlight\Language;
use Highlight\Mode;

class Rust extends Language {
	
	protected function getName() {
		return "rust";
	}
	
	protected function getIllegal() {
		return "<\/";
	}
	
	protected function getKeyWords() {
		return 
			"assert bool break char check claim comm const cont copy dir do drop " .
			"else enum extern export f32 f64 fail false float fn for i16 i32 i64 i8 " .
			"if impl int let log loop match mod move mut priv pub pure ref return " .
			"self static str struct task true trait type u16 u32 u64 u8 uint unsafe " .
			"use vec while";
	}

	protected function getContainedModes() {
		
		$TITLE = new Mode(array(
			"className" => "title",
			"begin" => $this->UNDERSCORE_IDENT_RE
		));
		
		$NUMBER = new Mode(array(
			"className" => "number",
			"begin" => "\b(0[xb][A-Za-z0-9_]+|[0-9_]+(\.[0-9_]+)?([uif](8|16|32|64)?)?)",
			"relevance" => 0
		));
		
		$tmp = clone $this->QUOTE_STRING_MODE;
		$tmp->illegal = null;
		
		return array(
			$this->C_LINE_COMMENT_MODE,
			$this->C_BLOCK_COMMENT_MODE,
			$tmp,
			$this->APOS_STRING_MODE,
			$NUMBER,
			new Mode(array(
				"className" => "function",
				"beginWithKeyword" => true, 
				"end" => "(\(|<)",
				"keywords" => "fn",
				"contains" => array($TITLE)
			)),
			new Mode(array(
				"className" => "preprocessor",
				"begin" => "#\[", 
				"end" => "\]"
			)),
			new Mode(array(
				"beginWithKeyword" => true, 
				"end" => "(=|<)",
				"keywords" => "type",
				"contains" => array($TITLE),
				"illegal" => "\S"
			)),
			new Mode(array(
				"beginWithKeyword" => true, 
				"end" => "({|<)",
				"keywords" => "trait enum",
				"contains" => array($TITLE),
				"illegal" => "\S"
			))		
		);
		
	}

}

?>