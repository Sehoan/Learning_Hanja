class Hanja{
	literal: string;
	en_meaning: string;
	jp_reading: string;
	kr_reading: string;

	constructor(public literal: string, public en_meaning: string, public jp_reading: string, kr_reading:string){
		this.literal = literal;
		this.en_meaning = en_meaning;
		this.jp_reading = jp_reading;
		this.kr_reading = kr_reading;
	}
}
