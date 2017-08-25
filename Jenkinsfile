#!groovy

def handleCheckout = {
	checkout ([
		$class: 'GitSCM',
		branches: scm.branches,
		extensions: [
				[$class: 'PruneStaleBranch'],
				[$class: 'CleanCheckout']
		],
		userRemoteConfigs: scm.userRemoteConfigs
	])
}

node() {
	stage('setup') {
		sh "env | sort"
		//handleCheckout()
		sh ('git branch -av')
	}

	stage('test') {
		sh "echo 'Throw in some tests here'"
	}
}
